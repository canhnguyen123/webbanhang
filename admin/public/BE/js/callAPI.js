const host = "https://provinces.open-api.vn/api/";

function callAPI(api) {
    return fetch(api)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            renderData(data, "province");
            setDefaultDistrict(data[0].code);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function callApiDistrict(api, defaultDistrictCode) {
    return fetch(api)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            renderData(data.districts, "district");
            setDefaultWard(data.districts[0].code);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function callApiWard(api) {
    return fetch(api)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            renderData(data.wards, "ward");
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function renderData(array, select) {
    if (Array.isArray(array)) {
        let options = '<option disabled value="">chọn</option>';
        array.forEach(element => {
            options += `<option value="${element.code}">${element.name}</option>`;
        });
        $("#" + select).html(options);
    }
}

callAPI(host + "?depth=1");

const defaultProvinceId = 'your_default_province_id';

fetch(host + "p/" + defaultProvinceId + "?depth=2")
    .then(response => {
        if (!response.ok) {
            throw new Error(`Network response was not ok, status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        renderData(data.districts, "district");
        setDefaultDistrict(data.districts[0].code);
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

function setDefaultDistrict(provinceCode) {
    const defaultDistrictApi = host + "p/" + provinceCode + "?depth=2";
    fetch(defaultDistrictApi)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            renderData(data.districts, "district");
            setDefaultWard(data.districts[0].code);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function setDefaultWard(districtCode) {
    const defaultWardApi = host + "d/" + districtCode + "?depth=2";
    fetch(defaultWardApi)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Network response was not ok, status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            renderData(data.wards, "ward");
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function updateResultText() {
    var province = $("#province option:selected").text();
    var district = $("#district option:selected").text();
    var ward = $("#ward option:selected").text();

    var resultText = ward + " , " + district + " , " + province;
    $("#result_local").val(resultText);
}
updateResultText();

$("#province").change(function() {
    var selectedProvinceCode = $(this).val();
    if (selectedProvinceCode) {
        var api = host + "p/" + selectedProvinceCode + "?depth=2";
        callApiDistrict(api, "");
    } else {
        $("#ward").html('<option disabled value="">chọn</option>');
    }
    updateResultText();
});

$("#district").change(function() {
    var selectedDistrictCode = $(this).val();
    if (selectedDistrictCode) {
        var api = host + "d/" + selectedDistrictCode + "?depth=2";
        callApiWard(api);
    } else {
        $("#ward").html('<option disabled value="">chọn</option>');
    }
    updateResultText();
});

$("#ward").change(function() {
    updateResultText();
});
