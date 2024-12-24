function findLargestSmallest(a, b, c) {
    return {
        largest: Math.max(a, b, c),
        smallest: Math.min(a, b, c)
    };
}

// Example usage:
console.log(findLargestSmallest(5, 12, 8));