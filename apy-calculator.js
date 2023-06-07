document.getElementById('apy-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const age = parseInt(document.getElementById('age').value);
    const pension = parseInt(document.getElementById('pension').value);

    const contribution = calculateContribution(age, pension);

    document.getElementById('monthly-investment').textContent = contribution.monthly;
    document.getElementById('total-contribution').textContent = contribution.total;
});

function calculateContribution(age, pension) {
    const remainingYears = 60 - age;
    const months = remainingYears * 12;

    // This is a simplified formula for demonstration purposes.
    // You should use a more accurate formula based on the actual APY scheme.
    const monthlyInvestment = (pension * months) / (5 * 12);
    const totalContribution = monthlyInvestment * months;

    return {
        monthly: Math.round(monthlyInvestment),
        total: Math.round(totalContribution),
    };
}