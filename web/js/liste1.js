function ajouter() {
  var d = document.createElement('div');
  var texte = document.createTextNode('Heeey');
  d.appendChild(texte);
  document.getElementsByTagName('body')[0].appendChild(d);
}
