<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <style>
        :root {
            --primary-500: #ec4899;
            --primary-600: #db2777;
            --primary-700: #be185d;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            @apply bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-white;
            min-height: 100vh;
        }
        
        .card-number {
            letter-spacing: 0.5px;
            font-family: 'Courier New', monospace;
        }
        
        input:not([type="submit"]), select {
            @apply transition-all duration-200 ease-in-out;
        }
        
        .tooltip {
            @apply invisible opacity-0;
            transition: opacity 0.2s ease-in-out;
        }
        
        .tooltip[data-show] {
            @apply visible opacity-100;
        }
        
        .focus-ring {
            @apply focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50;
        }
        
        .btn-primary {
            @apply transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5 transform;
            background-image: linear-gradient(to right, var(--primary-600), var(--primary-500));
        }
        
        input:invalid:not(:focus):not(:placeholder-shown) {
            @apply border-red-500 dark:border-red-400;
        }
        
        input:valid:not(:focus):not(:placeholder-shown) {
            @apply border-green-500 dark:border-green-400;
        }
        
        .datepicker-icon {
            @apply pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5;
        }
        
        .payment-icons {
            @apply flex flex-wrap items-center justify-center gap-4;
        }
        
        @media (max-width: 1023px) {
            .payment-container {
                flex-direction: column;
            }
        }
        
        .dark-transition {
            @apply transition-colors duration-300;
        }
    </style>
</head>
<body class="h-full dark-transition">
    <div class="flex min-h-full flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <a href="#" class="flex items-center">
                        <svg class="h-8 w-8 text-primary-600 dark:text-primary-500" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Secure checkout</span>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16" aria-labelledby="payment-heading">
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                    <div class="mx-auto max-w-5xl">
                        <!-- Progress Steps -->
                        <div class="mb-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-600 text-white">
                                        <span>1</span>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-primary-600 dark:text-primary-500">Shipping</span>
                                </div>
                                <div class="flex-1 border-t-2 border-primary-600 mx-2"></div>
                                <div class="flex items-center">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-600 text-white">
                                        <span>2</span>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-primary-600 dark:text-primary-500">Payment</span>
                                </div>
                                <div class="flex-1 border-t-2 border-gray-200 mx-2 dark:border-gray-700"></div>
                                <div class="flex items-center">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-200 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                        <span>3</span>
                                    </div>
                                    <span class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">Confirmation</span>
                                </div>
                            </div>
                        </div>

                        <h1 id="payment-heading" class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">Payment Information</h1>

                        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 payment-container">
                            <!-- Payment Form (inchangé) -->
                            <form action="#" method="POST" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                                <fieldset class="mb-6 grid grid-cols-2 gap-4">
                                    <legend class="sr-only">Payment details</legend>
                                    
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> 
                                            Full name <span class="text-red-500">*</span>
                                            <span class="sr-only">as displayed on card</span>
                                        </label>
                                        <input type="text" id="full_name" name="full_name" autocomplete="cc-name" 
                                               class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" 
                                               placeholder="Bonnie Green" required aria-required="true" />
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="card-number-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> 
                                            Card number <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="text" id="card-number-input" name="card_number" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number"
                                                   class="card-number block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" 
                                                   placeholder="4242 4242 4242 4242" required aria-required="true" />
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="card-expiration-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Expiration date <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="datepicker-icon">
                                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input datepicker datepicker-format="mm/yy" id="card-expiration-input" name="card_expiry" autocomplete="cc-exp"
                                                   type="text" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" 
                                                   placeholder="MM/YY" required aria-required="true" />
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="cvv-input" class="mb-2 flex items-center gap-1 text-sm font-medium text-gray-900 dark:text-white">
                                            CVV <span class="text-red-500">*</span>
                                            <button type="button" data-tooltip-target="cvv-desc" data-tooltip-trigger="hover" 
                                                    class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white" aria-label="What is CVV?">
                                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <div id="cvv-desc" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                                The last 3 digits on back of card
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </label>
                                        <div class="relative">
                                            <input type="password" id="cvv-input" name="cvv" inputmode="numeric" pattern="[0-9]{3,4}" autocomplete="cc-csc"
                                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" 
                                                   placeholder="•••" maxlength="4" required aria-required="true" />
                                            <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 cvv-toggle" aria-label="Reveal CVV">
                                                <svg class="h-5 w-5 text-gray-400 eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Billing Address -->
                                <div class="mb-6">
                                    <div class="flex items-center mb-4">
                                        <input id="billing-checkbox" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800">
                                        <label for="billing-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Use different billing address</label>
                                    </div>
                                    
                                    <div id="billing-address" class="hidden grid grid-cols-2 gap-4">
                                        <div class="col-span-2">
                                            <label for="billing-address-1" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Address line 1</label>
                                            <input type="text" id="billing-address-1" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="123 Main St">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="billing-address-2" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Address line 2 (optional)</label>
                                            <input type="text" id="billing-address-2" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Apt, suite, etc.">
                                        </div>
                                        <div>
                                            <label for="billing-city" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">City</label>
                                            <input type="text" id="billing-city" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="New York">
                                        </div>
                                        <div>
                                            <label for="billing-zip" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">ZIP/Postal code</label>
                                            <input type="text" id="billing-zip" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="10001">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn-primary flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-3 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <span class="mr-2">Complete Payment</span>
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                                
                                <p class="mt-4 text-center text-xs text-gray-500 dark:text-gray-400">
                                    By completing your purchase you agree to our <a href="#" class="text-primary-700 hover:underline dark:text-primary-500">Terms of Service</a> and <a href="#" class="text-primary-700 hover:underline dark:text-primary-500">Privacy Policy</a>.
                                </p>
                            </form>

                            <!-- Order Summary (Dynamique) -->
                            <div class="mt-6 grow sm:mt-8 lg:mt-0">
                                <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Order Summary</h3>
                                    <div class="space-y-3" id="order-summary-dynamic">
                                        <!-- Contenu chargé dynamiquement -->
                                        <div class="text-center py-8">
                                            <div class="animate-pulse">
                                                <div class="h-4 bg-gray-200 rounded dark:bg-gray-700 w-3/4 mx-auto mb-4"></div>
                                                <div class="h-4 bg-gray-200 rounded dark:bg-gray-700 w-1/2 mx-auto"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-4 dark:border-gray-700">
                                        <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                                        <dd class="text-lg font-bold text-gray-900 dark:text-white" id="dynamic-total">$0.00</dd>
                                    </dl>
                                </div>

                                <!-- Product Summary (Dynamique) -->
                                <div class="mt-6 rounded-lg border border-gray-100 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
                                    <h4 class="mb-4 text-sm font-medium text-gray-900 dark:text-white">Your Items</h4>
                                    <div class="space-y-4" id="product-summary-dynamic">
                                        <!-- Contenu chargé dynamiquement -->
                                        <div class="text-center py-8">
                                            <div class="animate-pulse">
                                                <div class="h-3 bg-gray-200 rounded dark:bg-gray-700 w-3/4 mx-auto mb-4"></div>
                                                <div class="h-3 bg-gray-200 rounded dark:bg-gray-700 w-1/2 mx-auto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Methods -->
                                <div class="mt-6">
                                    <h4 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">We accept</h4>
                                    <div class="payment-icons">
                                        <img class="h-6 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="PayPal" loading="lazy">
                                        <img class="hidden h-6 w-auto dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal-dark.svg" alt="PayPal" loading="lazy">
                                        <img class="h-6 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="Visa" loading="lazy">
                                        <img class="hidden h-6 w-auto dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg" alt="Visa" loading="lazy">
                                        <img class="h-6 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="Mastercard" loading="lazy">
                                        <img class="hidden h-6 w-auto dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard-dark.svg" alt="Mastercard" loading="lazy">
                                        <img class="h-6 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/amex.svg" alt="American Express" loading="lazy">
                                        <img class="hidden h-6 w-auto dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/amex-dark.svg" alt="American Express" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400 sm:mt-8 lg:text-left">
                            Payment processed securely by <a href="#" class="font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">Paddle</a>.
                            <span class="block sm:inline">United States Of America</span>
                        </p>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white py-6 dark:bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <p class="text-sm text-gray-500 dark:text-gray-400">&copy; 2023 Your Company. All rights reserved.</p>
                    <div class="mt-4 flex space-x-6 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400">
                            <span class="sr-only">Privacy Policy</span>
                            <span class="text-sm">Privacy</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400">
                            <span class="sr-only">Terms</span>
                            <span class="text-sm">Terms</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400">
                            <span class="sr-only">Support</span>
                            <span class="text-sm">Support</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>