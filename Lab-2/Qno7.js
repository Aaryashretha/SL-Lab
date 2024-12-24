function calculate(a, b) {
    return {
        addition: a + b,
        subtraction: a - b,
        multiplication: a * b,
        division: b !== 0 ? a / b : 'Cannot divide by zero'
    };
}

// Example usage:
let num1 = parseFloat(prompt("Enter first number:"));
let num2 = parseFloat(prompt("Enter second number:"));
console.log(calculate(num1, num2));
