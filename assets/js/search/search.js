const input_search = document.querySelector('input.search-bar');
const btn_search = document.querySelector('button.search-btn');

btn_search.addEventListener('click', function() {
    const value = input_search.value;
    if(value){
        window.location.href = `http://localhost/DoAnWeb2-BanDienThoai-MVC/views/search.php?key=${value}&page=1`;
    }
})
