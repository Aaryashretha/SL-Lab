function displayColors(color, o) {
    for (let i = 0; i < color.length; i++) {
        let suffix = (i + 1) === 1 ? o[1] : (i + 1) === 2 ? o[2] : (i + 1) === 3 ? o[3] : o[0];
        console.log(`${i + 1}${suffix} choice is ${color[i]}.`);
    }
}

// Example usage:
let color = ["Blue ", "Green", "Red", "Orange", "Violet", "Indigo", "Yellow "];
let o = ["th", "st", "nd", "rd"];
displayColors(color, o);