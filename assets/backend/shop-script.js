// Function to load the shop data (your shop_db.json)
async function loadShopData() {
    try {
        const response = await fetch('assets/backend/shop_db.json'); // Update the path if needed
        const data = await response.json();
        return data.items; // Return only the items from the JSON
    } catch (error) {
        console.error('Error loading the JSON data:', error);
    }
}

// Function to display the filtered items on the page
function displayItems(items) {
    const itemsList = document.getElementById('items-list');
    itemsList.innerHTML = ''; // Clear the current items

    items.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('item');
        itemElement.innerHTML = `
            <img src="${item.image_url}" alt="${item.name}">
            <h3>${item.name}</h3>
            <p>${item.description}</p>
            <p><strong>$${item.price}</strong></p>
        `;
        itemsList.appendChild(itemElement);
    });
}

// Function to filter items by category
function filterByCategory(categoryId, items) {
    if (categoryId === '0') return items; // If "All Categories" is selected, return all items
    return items.filter(item => item.category_id == categoryId); // Filter by category
}

// Function to filter items by search term
function searchItems(query, items) {
    return items.filter(item => 
        item.name.toLowerCase().includes(query.toLowerCase()) ||
        item.description.toLowerCase().includes(query.toLowerCase())
    );
}

// Handle the form submission (search and category change)
async function handleSearchAndFilter() {
    const data = await loadShopData();
    if (!data) return;

    const searchQuery = document.getElementById('search-input').value;
    const selectedCategory = document.getElementById('category-select').value;

    let filteredItems = data;

    // First filter by category, then search query
    filteredItems = filterByCategory(selectedCategory, filteredItems);
    filteredItems = searchItems(searchQuery, filteredItems);

    displayItems(filteredItems); // Display the filtered items
}

// Set up event listeners for the search and category select elements
document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent form submission (page reload)
    handleSearchAndFilter();
});

document.getElementById('category-select').addEventListener('change', function() {
    handleSearchAndFilter();
});

// Initial page load
handleSearchAndFilter();
