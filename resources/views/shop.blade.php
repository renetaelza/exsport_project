<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar for dropdown */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
/* euy jir*/
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 3px;
        }
    </style>
</head>

<body style="padding-top: 50px;">
    <x-navbar2 />
    <div class="hero">
        <div class="texthero-shop">
            <h4>Shop All</h4>
            <p>At Exsport, we believe in turning everyday moments into extraordinary experiences. Our journey began with a simple idea: to create bags that blend style, functionality, and joy. With over 70 vibrant flavors, each bag is a testament to our passion for creativity and adventure.</p>
            <br>
        </div>
        <div>
            <img src="{{ asset('storage/shop all (3).jpg') }}" alt="" style="width: 4500px; height: 450px;">
        </div>
    </div>

    <div class="max-w-full px-4 sm:px-6 md:px-10 lg:px-16 xl:px-20 2xl:px-24 py-6">
        <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
            <div class="flex items-center gap-2 flex-wrap">
                <label class="text-sm select-none" for="filter">Filter:</label>
                <div class="relative inline-block text-left">
                    <select aria-label="Filter by Color" class="border border-gray-300 rounded-md text-sm py-1 pl-2 pr-8 cursor-pointer focus:outline-none focus:ring-1 focus:ring-black focus:border-black" id="filter">
                        <option>Color</option>
                    </select>

                    <!-- Dropdown -->
                    <div class="absolute top-full left-0 mt-1 w-64 bg-white border border-gray-200 shadow-lg rounded-md z-20 hidden" id="colorDropdown">
                        <div class="flex justify-between items-center border-b border-gray-200 px-4 py-2 text-sm select-none">
                            <span class="text-[13px]">2 selected</span>
                            <button class="text-blue-600 focus:outline-none text-[12px]" id="resetColors" type="button">Reset</button>
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4 max-h-60 scrollbar-thin">
                            <!-- Color options -->
                            <label class="flex flex-col items-center">
                                <input class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color blue peer-checked:ring-2 ring-blue-700 block"></span>
                                <span class="text-[12px]">Blue</span>
                            </label>
                            <label class="flex flex-col items-center cursor-pointer select-none">
                                <input checked class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color green peer-checked:ring-2 ring-green-700 block"></span>
                                <span class="text-[12px]">Green</span>
                            </label>
                            <label class="flex flex-col items-center cursor-pointer select-none">
                                <input checked class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color yellow peer-checked:ring-2 ring-yellow-700 block"></span>
                                <span class="text-[12px]">Yellow</span>
                            </label>
                            <label class="flex flex-col items-center cursor-pointer select-none">
                                <input checked class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color White peer-checked:ring-2 ring-hite-700 block"></span>
                                <span class="text-[12px]">White</span>
                            </label>
                            <label class="flex flex-col items-center cursor-pointer select-none">
                                <input checked class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color pink peer-checked:ring-2 ring-pink-700 block"></span>
                                <span class="text-[12px]">Pink</span>
                            </label>
                            <label class="flex flex-col items-center cursor-pointer select-none">
                                <input checked class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color purple peer-checked:ring-2 ring-purple-700 block"></span>
                                <span class="text-[12px]">Purple</span>
                            </label>
                            <label class="flex flex-col items-center cursor-pointer select-none">
                                <input checked class="hidden peer" type="checkbox" />
                                <span class="w-7 h-7 border mb-1 color red peer-checked:ring-2 ring-red-700 block"></span>
                                <span class="text-[12px]">Red</span>
                            </label>
                            <!-- Tambah warna lain seperti di program 2 jika perlu -->
                        </div>
                    </div>
                </div>
                <!-- Tag ini akan diisi dengan warna yang dipilih -->
                <div id="selectedColorsDisplay" class="border border-black rounded-full py-1 px-4 text-xs font-semibold tracking-wide select-none">
                    COLOR
                </div>

            </div>
            <div class="flex items-center gap-2">
                <label class="text-sm select-none" for="sort">Sort by:</label>
                <select id="sort" class="border border-gray-300 rounded-md text-sm py-1 pl-2 pr-8 cursor-pointer focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                    <option>Featured</option>
                </select>
                <span class="pointer-events-none absolute right-6 top-[calc(50%-0.5em)] text-gray-600 text-xs" style="position: relative;">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </div>
        </div>
    </div>
    <!-- Overlay
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-40 z-0"></div> -->

    <div class="product-section">
        <div class="tabs">
            <button class="tab active">Most Popular</button>
            <button class="tab">New Arrival</button>
            <button class="tab">Backpack</button>
            <button class="tab">Pouch</button>
        </div>

        <div class="product-grid">
            <div class="product-item">
                <div class="product-image">
                    <img src="{{ asset('storage/holiday_bag (1).jpg') }}"
                        alt="The Dutchess" class="w-full rounded-md" width="400" height="250" />
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <button class="color pink" data-color="pink"></button>
                    <button class="color blue" data-color="blue"></button>
                    <button class="color yellow" data-color="yellow"></button>
                    <button class="color black" data-color="black"></button>
                    <button class="color white" data-color="white"></button>
                    <button class="color green" data-color="green"></button>
                </div>
            </div>
            <div class="product-item">
                <div class="product-image">
                    <img src="{{ asset('storage/holiday_bag (2).jpg') }}" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <button class="color pink" data-color="pink"></button>
                    <button class="color blue" data-color="blue"></button>
                    <button class="color yellow" data-color="yellow"></button>
                    <button class="color black" data-color="black"></button>
                    <button class="color white" data-color="white"></button>
                    <button class="color green" data-color="green"></button>
                </div>
            </div>
            <div class="product-item">
                <div class="product-image">
                    <img src="{{ asset('storage/holiday_bag (3).jpg') }}" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <button class="color pink" data-color="pink"></button>
                    <button class="color blue" data-color="blue"></button>
                    <button class="color yellow" data-color="yellow"></button>
                    <button class="color black" data-color="black"></button>
                    <button class="color white" data-color="white"></button>
                    <button class="color green" data-color="green"></button>
                </div>
            </div>
            <div class="product-item">
                <div class="product-image">
                    <img src="{{ asset('storage/holiday_bag (4).jpg') }}" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <button class="color pink" data-color="pink"></button>
                    <button class="color blue" data-color="blue"></button>
                    <button class="color yellow" data-color="yellow"></button>
                    <button class="color black" data-color="black"></button>
                    <button class="color white" data-color="white"></button>
                    <button class="color green" data-color="green"></button>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterSelect = document.getElementById("filter");
        const dropdown = document.getElementById("colorDropdown");
        const checkboxes = dropdown.querySelectorAll("input[type='checkbox']");
        const resetButton = document.getElementById("resetColors");
        const selectedCountDisplay = dropdown.querySelector("span");

        // Toggle dropdown ketika select "Color" diklik
        filterSelect.addEventListener("click", function(e) {
            e.preventDefault();
            dropdown.classList.toggle("hidden");
        });

        // Update jumlah warna yang dipilih
        function updateSelectedCount() {
            const selectedCount = [...checkboxes].filter(cb => cb.checked).length;
            selectedCountDisplay.textContent = `${selectedCount} selected`;
        }

        // Inisialisasi: update count saat load
        updateSelectedCount();

        // Tambahkan event listener ke setiap checkbox
        checkboxes.forEach(cb => {
            cb.addEventListener("change", updateSelectedCount);
        });

        // Reset filter
        resetButton.addEventListener("click", function() {
            checkboxes.forEach(cb => {
                cb.checked = false;
            });
            updateSelectedCount();
        });

        const displayDiv = document.getElementById('selectedColorsDisplay');

        function updateSelectedColors() {
            const selected = [];
            checkboxes.forEach((cb, index) => {
                if (cb.checked) {
                    const label = cb.closest('label');
                    const colorName = label.querySelector('span.text-xs').innerText;
                    selected.push(colorName);
                }
            });

            if (selected.length === 0) {
                displayDiv.textContent = 'COLOR';
            } else {
                displayDiv.textContent = selected.join(', ');
            }
        }

        // Inisialisasi saat halaman dimuat
        updateSelectedColors();

        // Tambahkan event listener
        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateSelectedColors);
        });

        // Klik di luar dropdown menutup dropdown
        document.addEventListener("click", function(e) {
            if (!dropdown.contains(e.target) && !filterSelect.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    });
</script>


</html>