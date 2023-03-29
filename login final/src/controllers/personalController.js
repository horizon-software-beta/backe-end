function index(req, res) {
    req.getConnection((err, conn) => {
      conn.query('SELECT * FROM users', (err, pers) => {
        if(err) {
          res.json(err);
        }
        console.log("--------",pers)
        res.render('pages/personal', { pers });
      });
    });
  }
  
  function create(req, res) {
  
    res.render('pers/create');
  }
  
  function store(req, res) {
    const data = req.body;
  
    req.getConnection((err, conn) => {
      conn.query('INSERT INTO users SET ?', [data], (err, rows) => {
        if(err) {
            res.json(err);
        }        
        res.redirect('/pers');
      });
    });
  }
  
  function destroy(req, res) {
    const id = req.body.id;
  
    req.getConnection((err, conn) => {
      conn.query('DELETE FROM users WHERE id = ?', [id], (err, rows) => {
        if(err) {
            res.json(err);
        }
        res.redirect('/pers');
      });
    })
  }
  
  function edit(req, res) {
    const id = req.params.id;
  
    req.getConnection((err, conn) => {
      conn.query('SELECT * FROM users WHERE id = ?', [id], (err, tasks) => {
        if(err) {
          res.json(err);
        }
        res.render('pers/edit', { tasks });
      });
    });
  }
  
  function update(req, res) {
    const id = req.params.id;
    const data = req.body;
  
    req.getConnection((err, conn) => {
      conn.query('UPDATE users SET ? WHERE id = ?', [data, id], (err, rows) => {
        if(err) {
            res.json(err);
        }
        res.redirect('/pers');
      });
    });
  }
  
  //Funcion para redireccionar a personal
  function usu(req, res) {
    if (req.session.loggedin) {
      res.redirect('/');
    } else {
      res.render('pages/usuario');
    }
    
  }
  
  //Modulos de coneccion
  module.exports = {
    index: index,
    create: create,
    store: store,
    destroy: destroy,
    edit: edit,
    update: update,
    usu: usu,
  }