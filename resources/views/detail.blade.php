<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<!-- euy jir -->

<body style="padding-top: 80px;">
    <x-navbar2 />
    <div class="max-w-[1200px] mx-auto flex flex-col lg:flex-row px-4 py-6 gap-6">
        <!-- Left side thumbnails -->
        <div class="hidden lg:flex flex-col gap-4 pr-6 border-r border-[#f6f0e3]">
            <button aria-label="Select Broccoli color image" class="border border-[#1a3a2f] p-1 rounded-sm">
                <img alt="Broccoli color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/696a3747-77e9-4440-e211-1018fa2b7381.jpg" width="40" />
            </button>
            <button aria-label="Select dark gray color image" class="opacity-50">
                <img alt="Dark gray color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/c69ac56a-aba4-4004-e427-3f28f18e29f8.jpg" width="40" />
            </button>
            <button aria-label="Select green color image" class="opacity-50">
                <img alt="Green color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/9cd80e64-417d-4bb6-a02b-1aacf51db9ab.jpg" width="40" />
            </button>
            <button aria-label="Select green color image" class="opacity-50">
                <img alt="Green color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/9cd80e64-417d-4bb6-a02b-1aacf51db9ab.jpg" width="40" />
            </button>
            <button aria-label="Select broccoli color image" class="opacity-50">
                <img alt="Broccoli color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/696a3747-77e9-4440-e211-1018fa2b7381.jpg" width="40" />
            </button>
            <button aria-label="Select gray color image" class="opacity-50">
                <img alt="Gray color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/a7e201d9-4245-4122-6490-3bcf566a8462.jpg" width="40" />
            </button>
            <button aria-label="Select green color image" class="opacity-50">
                <img alt="Green color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/9cd80e64-417d-4bb6-a02b-1aacf51db9ab.jpg" width="40" />
            </button>
            <button aria-label="Select green color image" class="opacity-50">
                <img alt="Green color Dutch oven top view" class="w-10 h-10 object-contain" height="40" src="https://storage.googleapis.com/a1aa/image/9cd80e64-417d-4bb6-a02b-1aacf51db9ab.jpg" width="40" />
            </button>
        </div>

        <!-- Main image and arrows with product info slidder -->
        <div class="container product-scroll-wrapper">
            <div class="product-content">
                <div class="img">
                    <img alt="Broccoli color Dutch oven with lid on, side view" src="{{ asset('storage/holiday_bag (1).jpg') }}" />
                    <img alt="Broccoli color Dutch oven with lid on, side view" src="{{ asset('storage/holiday_bag (1).jpg') }}" />
                    <img alt="Broccoli color Dutch oven with lid on, side view" src="{{ asset('storage/holiday_bag (1).jpg') }}" />
                    <img alt="Broccoli color Dutch oven with lid on, side view" src="{{ asset('storage/holiday_bag (1).jpg') }}" />
                    <img alt="Broccoli color Dutch oven with lid on, side view" src="{{ asset('storage/holiday_bag (1).jpg') }}" />
                </div>

                <!-- Product details -->
                <div class="product-details">
                    <h1 class="">
                        The Dutchess
                    </h1>
                    <div class="">
                        <span class="font-bold text-lg">
                            $205
                        </span>
                    </div>
                    <p class="">
                        Color: Emerald Green
                    </p> <br>
                    <p>Dimension: 13 x 8 cm</p><br>
                    <p>Material: Nylon</p><br>
                    <p>Available color: Black, Red, Light Pink, Emerald Green, Blueberry, Dark Olive</p><br>
                    <p>
                        Special Features:</p><br>
                    <p>1. Main compartment (with zipper)</p><br>
                    <p>2. Equipped with 5 card holders (one on the front and four on the back)</p><br>
                    <p>3. Equipped with one card holder with mica cover on the front</p><br>
                    <p> 4. Equipped with a carabiner to hang lanyard</p><br>
                    <p>5. Equipped with 43 cm neck strap</p><br>
                    <p>Quality & Warranty: Made from high quality nylon and water-repellent material with lifetime warranty.</p><br>
                    <p>Let us befriend your hustler journey! ⏲💻</p><br>
                    <p>Go get this collection at the link in our bio or at our nearest flagship store! 🛒</p><br>
                    <p class="">
                        Why It's Special
                    </p>
                    <ul class="text-xs text-gray-500 list-disc list-inside mb-4 space-y-1">
                        <li>
                            Safe for all stovetops (including induction).
                        </li>
                        <li>
                            Choose between six matte colors to match your style.
                        </li>
                        <li>
                            Our signature oval shape perfectly fits a chicken.
                        </li>
                    </ul>
                    <div class="mb-4 flex items-center gap-2 text-sm">
                        <span class="font-semibold text-[#1a3a2f]">
                            Color:
                        </span>
                        <span>
                            Broccoli
                        </span>
                        <div class="product-vars">
                            <button aria-label="Select Broccoli color" class="w-6 h-6 rounded-full border border-[#1a3a2f] bg-[#3a5a40]">
                            </button>
                            <button aria-label="Select pink color" class="w-6 h-6 rounded-full bg-[#dba3a3]">
                            </button>
                            <button aria-label="Select blue color" class="w-6 h-6 rounded-full bg-[#2a3a7a]">
                            </button>
                            <button aria-label="Select orange color" class="w-6 h-6 rounded-full bg-[#dba33a]">
                            </button>
                            <button aria-label="Select black color" class="w-6 h-6 rounded-full bg-black">
                            </button>
                            <button aria-label="Select white color" class="w-6 h-6 rounded-full bg-white border border-gray-300">
                            </button>
                        </div>
                    </div>

                    <button method="POST" class="w-full bg-[#1a3a2f] text-white font-semibold py-3 rounded hover:bg-[#163225] transition">
                        Add to Cart | $205
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="product-section">
        <h1 class="text-3xl font-bold mb-1"> Related Products</h1><br>
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
        <div class="flex justify-between items-center mt-8 text-sm font-semibold text-[#1e3a8a]">
            <!-- Pagination -->
            <div class="w-full text-center">
                <div class="inline-flex space-x-2">
                    <button class="underline">1</button>
                    <button class="text-gray-400 cursor-default">2</button>
                    <button class="text-gray-400 cursor-default">3</button>
                </div>
            </div>

            <!-- Next Button  -->
            <div>
                <button class="w-10 h-10 rounded-full border-2 border-[#1e3a8a] text-[#1e3a8a] flex items-center justify-center hover:bg-[#1e3a8a] hover:text-white transition">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const wrapper = document.querySelector('.product-scroll-wrapper');
        const details = wrapper.querySelector('.product-details');
        const image = wrapper.querySelector('.img');

        const detailScrollDone = () => {
            return details.scrollTop + details.clientHeight >= details.scrollHeight;
        }

        const imageScrollDone = () => {
            return image.scrollTop + image.clientHeight >= image.scrollHeight;
        }

        let phase = 1; // 1: scroll detail, 2: scroll image, 3: scroll normal

        wrapper.addEventListener('wheel', (e) => {
            if (phase === 1) {
                details.scrollTop += e.deltaY;
                if (detailScrollDone()) {
                    phase = 2;
                }
                e.preventDefault();
            } else if (phase === 2) {
                image.scrollTop += e.deltaY;
                if (imageScrollDone()) {
                    phase = 3;
                }
                e.preventDefault();
            }
            // phase 3: biarkan browser scroll normal ke konten selanjutnya
        }, {
            passive: false
        });
    });
</script>


</html>