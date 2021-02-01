// write your code here
// use products array from the other file in here 
// (yes you can use it, it doesn't matter if it's from another file)

let filterActive = 'SHOWALL';
let brandActive = 'none'

fetch('https://json-project3.herokuapp.com/products')
    .then(responce => { return responce.json() })
    .then(data => {
        console.log(filterActive)
        // pocetna sostojba karticki
        let filteredData = data
        createCards(filteredData);
        // pocetna sostojba na brand filtri
        let brands = refreshBrands(data)

        $('#SHOWALL span').text(`${data.length}`)

        $('#MALE span').text(`${data.filter(bike => { return bike.gender == 'MALE' }).length}`);
        $('#FEMALE span').text(`${data.filter(bike => { return bike.gender == 'FEMALE' }).length}`);

        $(document).on('click', '.list-group-item', function (e) {

            switch ($(this).attr('id')) {
                case 'SHOWALL':
                    if (filterActive == 'MALE' || filterActive == 'FEMALE') {
                        filterActive = 'SHOWALL';
                        filteredData = data;
                        createCards(filteredData);
                        brands = refreshBrands(filteredData);
                        $('.list-group-item').removeClass('list-group-item-active')
                        $('.list-group-item').addClass('list-group-item-pasive')
                        $('.list-group-item span').removeClass('badge-custom-active')
                        $('.list-group-item span').addClass('badge-custom-pasive')
                        $(this).addClass('list-group-item-active')
                        $(this).children().eq(0).addClass('badge-custom-active')
                        brandActive = 'none';
                    }
                    break;
                case 'MALE':
                    if (filterActive == 'SHOWALL' || filterActive == 'FEMALE') {
                        filterActive = 'MALE';
                        filteredData = data.filter(bike => { return bike.gender == 'MALE' });
                        createCards(filteredData);
                        brands = refreshBrands(filteredData);
                        $('.list-group-item').removeClass('list-group-item-active')
                        $('.list-group-item').addClass('list-group-item-pasive')
                        $('.list-group-item span').removeClass('badge-custom-active')
                        $('.list-group-item span').addClass('badge-custom-pasive')
                        $(this).addClass('list-group-item-active')
                        $(this).children().eq(0).addClass('badge-custom-active')
                        brandActive = 'none';
                    }
                    // filterActive = 'MALE';
                    // createCards(data.filter(bike => {return bike.gender == 'MALE'}))
                    break;
                case 'FEMALE':
                    if (filterActive == 'MALE' || filterActive == 'SHOWALL') {
                        filterActive = 'FEMALE';
                        filteredData = data.filter(bike => { return bike.gender == 'FEMALE' });
                        createCards(filteredData)
                        brands = refreshBrands(filteredData);
                        $('.list-group-item').removeClass('list-group-item-active')
                        $('.list-group-item').addClass('list-group-item-pasive')
                        $('.list-group-item span').removeClass('badge-custom-active')
                        $('.list-group-item span').addClass('badge-custom-pasive')
                        $(this).addClass('list-group-item-active')
                        $(this).children().eq(0).addClass('badge-custom-active')
                        brandActive = 'none';
                    }
                    // filterActive = 'FEMALE';
                    // createCards(data.filter(bike => {return bike.gender == 'FEMALE'}))
                    break;
                default:
                    let brandFound = [];
                    if (brandActive == 'none') {
                        brandActive = $(this).attr('id');
                        brandFound = brands.find(brandId => { return brandId.id == brandActive });
                        createCards(filteredData.filter(bike => { return bike.brand == brandFound.brand }))
                        $('.list-group-item').each((index, group) => {
                            if (!(group.id == 'SHOWALL' || group.id == 'MALE' || group.id == 'FEMALE')) {
                                console.log('tocno', $(group));
                                $(group).removeClass('list-group-item-active')
                                $(group).addClass('list-group-item-pasive')
                                $(group).children().eq(0).removeClass('badge-custom-active')
                                $(group).children().eq(0).addClass('badge-custom-pasive')
                                if (group.id == brandActive) {
                                    $(group).addClass('list-group-item-active')
                                    $(group).children().eq(0).addClass('badge-custom-active')
                                }
                            }
                        })
                        break;
                    } else if (brandActive == $(this).attr('id')) {
                        createCards(filteredData);
                        brandActive = 'none';
                        if (!(group.id == 'SHOWALL' || group.id == 'MALE' || group.id == 'FEMALE')) {
                            console.log('tocno', $(group));
                            $(group).removeClass('list-group-item-active')
                            $(group).addClass('list-group-item-pasive')
                            $(group).children().eq(0).removeClass('badge-custom-active')
                            $(group).children().eq(0).addClass('badge-custom-pasive')
                        }
                        break;
                    } else {
                        brandActive = $(this).attr('id');
                        brandFound = brands.find(brandId => { return brandId.id == brandActive });
                        createCards(filteredData.filter(bike => { return bike.brand == brandFound.brand }))
                        $('.list-group-item').each((index, group) => {
                            if (!(group.id == 'SHOWALL' || group.id == 'MALE' || group.id == 'FEMALE')) {
                                console.log('tocno', $(group));
                                $(group).removeClass('list-group-item-active')
                                $(group).addClass('list-group-item-pasive')
                                $(group).children().eq(0).removeClass('badge-custom-active')
                                $(group).children().eq(0).addClass('badge-custom-pasive')
                                if (group.id == brandActive) {
                                    $(group).addClass('list-group-item-active')
                                    $(group).children().eq(0).addClass('badge-custom-active')
                                }
                            }
                        })
                        break;
                    }
            }
        })
    })

function refreshBrands(bikesArray) {
    let brands = []
    bikesArray.forEach(bike => {
        let filteredBrand = brands.filter(brand => {
            return brand.brand == bike.brand
        })
        if (filteredBrand.length != 0) {
            for (let i = 0; i < brands.length; i++) {
                if (brands[i].brand == bike.brand) {
                    brands[i].number += 1;
                }
            }
        } else {
            brands.push({
                id: bike.brand.split(' ').join(''),
                brand: bike.brand,
                number: 1
            })
        }
    })
    $('#brands').html('');
    brands.forEach(brand => {
        $('#brands').append(`
        <li id="${brand.id}" class="list-group-item d-flex justify-content-between align-items-center list-group-item-pasive">
        ${brand.brand}
        <span class="badge badge-custom badge-pill badge-custom-pasive">${brand.number}</span>
        </li>
        `)
    })
    return brands
}

function createCards(array) {
    $('#cardContainer').html('');
    array.forEach(bike => {
        $('#cardContainer').append(`
        <div class="col-sm-12 col-md-6 col-lg-4 pb-4">
            <div class="card">
                <div class="image-wrapper">
                <img src="./img/${bike.image}.png" class="card-img-top p-3" height="auto" width="auto" alt="Image of ${bike.name}">
                </div>
                <div class="card-body">
                <p class="card-text font-weight-bold">${bike.name}</p>
                <p class="card-text">${bike.price} $</p>
                </div>
            </div>
        </div>
        `
        );
    });
}

$(document).on('mouseenter', '.list-group-item', function (e) {
    if ($(this).attr('id') != filterActive && $(this).attr('id') != brandActive) {
        $(this).removeClass('list-group-item-pasive')
        $(this).addClass('list-group-item-active')
        $(this).children().eq(0).removeClass('badge-custom-pasive')
        $(this).children().eq(0).addClass('badge-custom-active')
    }
})

$(document).on('mouseleave', '.list-group-item', function (e) {
    if ($(this).attr('id') != filterActive && $(this).attr('id') != brandActive) {
        $(this).removeClass('list-group-item-active')
        $(this).addClass('list-group-item-pasive')
        $(this).children().eq(0).removeClass('badge-custom-active')
        $(this).children().eq(0).addClass('badge-custom-pasive')
    }
})