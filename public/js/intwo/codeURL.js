$(".keyUp").keyup(function() {
  $($(this).data("code")).val(makeSlug(this.value));
});

function makeSlug(text) {
  var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
  var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
  var p = new RegExp(a.split('').join('|'), 'g');

  return text.toString().toLowerCase().replace(/\s+/g, '-')
    .replace(p, function(c) {
      return b.charAt(a.indexOf(c));
    })
    .replace(/&/g, '-y-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-')
    .replace(/^-+/, '')
    .replace(/-+$/, '');
}