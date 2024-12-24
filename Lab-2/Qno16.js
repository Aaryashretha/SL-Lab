function checkOddEven() {
    for (let i = 0; i <= 15; i++) {
        console.log(`${i} is ${i % 2 === 0 ? 'even' : 'odd'}.`);
    }
}

// Example usage:
checkOddEven();