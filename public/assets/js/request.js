const url = 'https://madina.ysnirix.live/api/cities';
const selectOption = document.getElementById('cities');
const city = document.querySelector('.city');
let markup = '';

async function fetchCities() {
    let response = await fetch(url);

    if (response.status === 200) {
        let data = await response.json();

        return data.results.map(city => {
            markup += `
                <option>${city.name}</option>
            `;
            selectOption.innerHTML = markup;

        });
    }
}

document.addEventListener('click', function () {
    console.log(city.selectedIndex)
});

fetchCities();

