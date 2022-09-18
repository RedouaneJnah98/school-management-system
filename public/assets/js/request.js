const url = 'https://madina.ysnirix.live/api/cities';
const selectOption = document.getElementById('cities');
const code = document.getElementById('address_zip');
let markup = '';
let city;

async function fetchCities() {
    let response = await fetch(url);

    if (response.status === 200) {
        let data = await response.json();

        selectOption.addEventListener('change', function () {
            city = this.value;

            return data.results.map(item => {
                if (city === item.name) {
                    code.value = item.code;
                }
            });
        });

        return data.results.map(city => {
            markup += `
                <option>${city.name}</option>
            `;

            selectOption.innerHTML = markup;
        });
    }
}

fetchCities();


