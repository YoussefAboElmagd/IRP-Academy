<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <script>
      tailwind.config = {
        theme: {
          extend: {
            gridTemplateColumns: {
              fluid: "repeat(auto-fit, minmax(15rem, 1fr))",
            },
            colors: {
              "primary-color": "#513618",
              "hover-color": "#3a2d11",
            },
          },
        },
      };
    </script>
    <link rel="stylesheet" href="./css/all.min.css" />
    <title>PAGE 5</title>
  </head>
  <body style="background-color:#f4ebda; padding:0 9%;">
    <?php 
          
          require('main_nav.php');
          require('searchbar.php');
      
    ?>
    <!-- START OF THE WHOLE PAGE LAYOUT -->
    <div class="bg-[#f5f5f5]" style="padding:0 9%;">

      <!-- START OF THE INNER PAGE LAYOUT -->
      <!-- INSERT NAVBAR HERE IF NEEDED -->
      <div class="bg-[#f5f5f5] container mx-auto md:p-16">
        <!-- START OF THE MAIN GRID LAYOUT -->
        <div class="grid grid-cols-2 lg:grid-cols-12 gap-4">
          <!-- START OF FIRST COLUMN -->
          <div class="col-span-12 lg:col-span-12 bg-[#f5f5f5]">
            <div class="bg-white p-12">
              <div class="flex flex-col gap-4">
                <h1 class="font-bold text-2xl">Contact MDPI by E-Mail</h1>
                <span class="text-sm"
                  >Fill out the following form and click on 'Submit' to send us
                  a message.</span
                >
                <h3 class="font-bold text-xl mb-4">Contact Information</h3>
              </div>

              <!-- NOTE -->
              <div class="bg-gray-100 rounded-sm p-2 mb-8">
                <div class="flex items-center gap-3">
                  <i class="fa-solid fa-circle-info"></i>
                  <p class="text-xs">
                    <span class="text-red-500">req </span>denotes required
                    fields.
                  </p>
                </div>
              </div>
              <!-- NOTE -->

              <!-- START OF CONTACT FORM -->
              <form action="#" method="post" class="space-y-4">
                <!-- Your Query (Select Option) -->
                <div>
                  <label
                    for="query"
                    class="block text-sm font-medium text-gray-600"
                    >Your Query
                    <span class="text-red-500 text-xs">(req)</span></label
                  >
                  <select
                    id="query"
                    name="query"
                    required
                    class="mt-1 block w-full border border-black p-1 rounded-md shadow-sm sm:text-sm"
                  >
                    <option disabled>Please Choose</option>
                    <option value="tech-support">Technical Support</option>
                    <option value="billing">Billing Inquiry</option>
                  </select>
                </div>

                <!-- Your Name (Text Input) -->
                <div>
                  <label
                    for="name"
                    class="block text-sm font-medium text-gray-600"
                    >Your Name
                    <span class="text-red-500 text-xs">(req)</span></label
                  >
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="mt-1 block w-full border border-black py-1 px-2 rounded-md shadow-sm sm:text-sm"
                    required
                  />
                </div>

                <!-- Your Email (Email Input) -->
                <div>
                  <label
                    for="email"
                    class="block text-sm font-medium text-gray-600"
                    >Your Email
                    <span class="text-red-500 text-xs">(req)</span></label
                  >
                  <input
                    type="email"
                    id="email"
                    name="email"
                    class="mt-1 block w-full border border-black py-1 px-2 rounded-md shadow-sm sm:text-sm"
                    required
                  />
                </div>

                <!-- Subject (Text Input) -->
                <div>
                  <label
                    for="subject"
                    class="block text-sm font-medium text-gray-600"
                    >Subject
                    <span class="text-red-500 text-xs">(req)</span></label
                  >
                  <input
                    type="text"
                    id="subject"
                    name="subject"
                    class="mt-1 block w-full border border-black py-1 px-2 rounded-md shadow-sm sm:text-sm"
                    required
                  />
                </div>

                <!-- Message (Textarea) -->
                <div>
                  <label
                    for="message"
                    class="block text-sm font-medium text-gray-600"
                    >Message
                    <span class="text-red-500 text-xs">(req)</span></label
                  >
                  <textarea
                    id="message"
                    name="message"
                    class="mt-1 block w-full border border-black py-1 px-2 resize-none rounded-md shadow-sm sm:text-sm"
                    rows="4"
                    required
                  ></textarea>
                </div>

                <!-- Submit Button -->
                <div>
                  <button
                    type="submit"
                    class="w-full bg-primary-color hover:bg-hover-color transition-all text-white py-2 px-4 rounded-md focus:outline-none"
                  >
                    Submit
                  </button>
                </div>
              </form>
              <!-- END OF CONTACT FORM -->
            </div>
          </div>
          <!-- END OF FIRST COLUMN -->
        </div>
        <!-- END OF THE MAIN GRID LAYOUT -->
      </div>
      <!-- END OF THE MAIN PAGE LAYOUT -->
    </div>
    <!-- END OF THE WHOLE PAGE LAYOUT -->
    <?php require('footer.php'); ?>
  </body>
</html>
