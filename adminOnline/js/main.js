window.addEventListener('load', function() {
    getNewsletters()
    getCaptchas();
    getUsers();
})

async function searchUsers() {
    const searchInput = document.getElementById('search_input');
    const s = searchInput.value;
    const res = await fetch("http://localhost:50/adminOnline/php/search_users.php?search=" + s);
    const txt = await res.text();
    const div = document.getElementById("user_result");
    div.innerHTML = txt;
}

async function getUsers() {
    const res = await fetch("http://localhost:50/adminOnline/php/get_all_users.php");
    const txt = await res.text();
    const div = document.getElementById("user_result");
    div.innerHTML = txt;
}

async function getCaptchas() {
    const res = await fetch("http://localhost:50/adminOnline/php/get_captchas.php");
    const txt = await res.text();
    const div = document.getElementById("captcha_result");
    div.innerHTML = txt;
}

async function searchCaptchas() {
    const searchInput = document.getElementById('search_input');
    const s = searchInput.value;
    const res = await fetch("http://localhost:50/adminOnline/php/search_captchas.php?search=" + s);
    const txt = await res.text();
    const div = document.getElementById("captcha_result");
    div.innerHTML = txt;
}


async function getNewsletters() {
   
    const res = await fetch("http://localhost:50/adminOnline/php/get_newsletters.php");
    const txt = await res.text();
    const div = document.getElementById("news");
    div.innerHTML = txt;
}

async function searchNewsletters() {
    const searchInput = document.getElementById('search_input');
    const s = searchInput.value;
    const res = await fetch("http://localhost:50/adminOnline/php/search_newsletters.php?search=" + s);
    const txt = await res.text();
    const div = document.getElementById("news");
    div.innerHTML = txt;
}

