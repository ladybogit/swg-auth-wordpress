function swg_auth_generate_secret_key( field ) {
  var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var length = 32;
  var key = '';
  for ( var i = 0; i < length; i++ ) {
    key += chars[ Math.floor( Math.random() * chars.length ) ];
  }
  document.getElementById( field ).value = key;
}
