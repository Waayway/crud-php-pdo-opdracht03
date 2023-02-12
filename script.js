const range = document.querySelector("input[type='range']");
const output = document.querySelector("#rangeOutput");

range.addEventListener("input", () => {
    let outputText = parseFloat(range.value).toFixed(1);
    output.innerText = outputText;
})