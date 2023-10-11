// 給料の下限
const minSalaryInput = document.getElementById("minSalary");
// 給料の上限
const maxSalaryInput = document.getElementById("maxSalary");

// 給料の上限を、給料の下限に設定する
minSalaryInput.addEventListener("input", function() {
    const minValue = parseInt(minSalaryInput.value, 10);
    maxSalaryInput.min = isNaN(minValue) ? "" : minValue;
    maxSalaryInput.value = isNaN(minValue) ? "" : minValue;
})

// maxSalaryInput.addEventListener("input", function() {
//     const maxValue = parseInt(maxSalaryInput.value, 10);
//     minSalaryInput.max = isNaN(maxValue) ? "" : maxValue;
// })