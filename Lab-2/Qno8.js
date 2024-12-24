function findLargerSmaller(a, b) {
    return {
        larger: Math.max(a, b),
        smaller: Math.min(a, b)
    };
}

// Example usage:
console.log(findLargerSmaller(10, 20));
