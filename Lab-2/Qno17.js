function findLargestOfFive() {
    // Prompt the user to input five numbers
    let num1 = parseFloat(prompt("Enter the first number:"));
    let num2 = parseFloat(prompt("Enter the second number:"));
    let num3 = parseFloat(prompt("Enter the third number:"));
    let num4 = parseFloat(prompt("Enter the fourth number:"));
    let num5 = parseFloat(prompt("Enter the fifth number:"));

    // Find the largest number using conditional statements
    let largest = num1;

    if (num2 > largest) {
        largest = num2;
    }
    if (num3 > largest) {
        largest = num3;
    }
    if (num4 > largest) {
        largest = num4;
    }
    if (num5 > largest) {
        largest = num5;
    }

    // Display the result in an alert box
    alert(`The largest number is ${largest}.`);
}

// Example usage: Call this function in a browser environment
findLargestOfFive();
