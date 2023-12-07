const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.addEventListener('change', function(){
    fetch('/seller/dashboard/categories/s/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
})
