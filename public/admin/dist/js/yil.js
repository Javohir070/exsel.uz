
// Boshlang'ich va tugash yillari
var startYear = 2010;
var endYear = 2025;

// Barcha class nomi 'science-sub-category' bo'lgan select elementlarini olish
var selects = document.getElementsByClassName('science-sub-categoryyil');

// Har bir select elementi uchun sikl
for (var i = 0; i < selects.length; i++) {
    var select = selects[i];

    // Har bir select elementi uchun yillarni qo'shish
    for (var year = endYear; year >= startYear; year--) {
        var option = document.createElement('option');
        option.value = year;
        option.text = year;
        option.className = 'year-option'; // Class qo'shish
        select.appendChild(option);
    }
}
