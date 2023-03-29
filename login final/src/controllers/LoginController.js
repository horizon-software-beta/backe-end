
const bcrypt = require('bcrypt');


function index(req, res) {
  console.log("entre");
  //console.log(req.oidc.isAuthenticated());
  //if (req.session.loggedin) {
    if (req.oidc.isAuthenticated()) {  
      console.log("autenticado");
    res.redirect('/register');
  } else {
    console.log("NO autenticado");
    res.render('/personal');
  }
}

function register(req, res) {
  if (req.session.loggedin) {
    res.redirect('/');
  } else {
    res.render('login/register');
  }
  
}

function storeUser(req,res){
  const data=req.body;
  req.getConnection((err,conn) => {
    conn.query('SELECT * FROM users WHERE email= ?',[data.email], (err,userData) => {
      if (userData.length>0){
        res.render('login/register', {error: 'User already exists'});
      } else {
        bcrypt.hash(data.password, 12).then(hash => {
          console.log(hash);
          data.password=hash;
          //console.log(data);
          req.getConnection((err,conn) => {
              conn.query('INSERT INTO users SET ?',[data], (err,rows) => {
                res.redirect('/'); 
              });
          });
      
        });
      }
    });
  });
} 


function auth(req, res) {
  const data = req.body;
	//let email = req.body.email;
	//let password = req.body.password;

  req.getConnection((err, conn) => {
    conn.query('SELECT * FROM users WHERE email = ?', [data.email], (err, userData) => {
      if(userData.length > 0) {
        userData.forEach(element => {
          bcrypt.compare(data.password,element.password, (err,isMatch) => {
            if(!isMatch){
              console.log("out",userData);
              res.render('login/index', {error: 'Error password or email do not exist!'});
            } else {
              console.log("wellcome");
              req.session.loggedin = true;
              req.session.name = element.name;
              res.redirect('/');
            }
          });   
        });     
      } else {
        res.render('login/index', {error: 'Error password or email do not exist!'});
      }    
    });
  });
}

function logout(req, res) {
  if (req.session.loggedin == true) {
    req.session.destroy();
  }
  res.redirect('/login');
}

function personal(req, res) {
  res.render('pages/personal');
}


module.exports = {
  index: index,
  register: register,
  auth: auth,
  logout: logout,
  storeUser: storeUser,
  personal: personal,

}

