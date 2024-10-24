<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fortressminers | Keeping money safe</title>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3224360-6']);
        _gaq.push(['_trackPageview']);
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "https://www.fortressminers.com",
        "logo": "https://fortressminers.com/images/Fortress_Logo_PMS_542_6in.png"
      }
    </script>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Store",
        "image": [
          "https://fortressminers.com/visitors1/img/banner.jpg",
          "https://fortressminers.com/visitors1/img/mockup.png",
          "https://fortressminers.com/images/Fortress_Logo_PMS_542_6in.png"
        ],
        "name": "Fortressminers | Best Investment Platform!",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "535 Madison Ave #15th, New York, NY 10022, United States.",
          "addressLocality": "New York",
          "addressRegion": "NY",
          "postalCode": "10022",
          "addressCountry": "US"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": 40.7128,
          "longitude": 74.0060
        },
        "url": "https://www.example.com/store-locator/sl/San-Jose-Westgate-Store/1427",
        "priceRange": "$100",
        "telephone": "{{ env('SITE_NUMBER') }}",
        "openingHoursSpecification": [
          {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Friday",
              "Saturday"
            ],
            "opens": "08:00",
            "closes": "23:59"
          },
          {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": "Sunday",
            "opens": "08:00",
            "closes": "23:00"
          }
        ],
        "department": [
          {
            "@type": "Investment",
            "image": [
          "https://fortressminers.com/images/Fortress_Logo_PMS_542_6in.png"
        ],
            "name": "Fortressminers's Investment",
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "535 Madison Ave #15th, New York, NY 10022, United States.",
              "addressLocality": "New York",
              "addressRegion": "NY",
              "postalCode": "10022",
              "addressCountry": "US"
            },
            "priceRange": "$100",
            "telephone": "{{ env('SITE_NUMBER') }}",
            "openingHoursSpecification": [
              {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                  "Monday",
                  "Tuesday",
                  "Wednesday",
                  "Thursday",
                  "Friday"
                ],
                "opens": "09:00",
                "closes": "19:00"
              },
              {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "09:00",
                "closes": "17:00"
              },
              {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Sunday",
                "opens": "11:00",
                "closes": "17:00"
              }
            ]
          }
        ]
      }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [

          @foreach($faqs as $faq)
          {
          "@type": "Question",
          "name": "{{ $faq->question }}",
          "acceptedAnswer": {
            "@type": "Answer",
            "text":"{{ $faq->answer }}"
          }
          },
          @endforeach
          {
          "@type": "Question",
          "name": "Will I be charged for depositing money?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text":"Charges will not be collected if you are making deposits to fortressminers platform: <ul><li>Web</li><li>App</li><li>Desktop</li></ul>"}
          }
      ]
    }
    </script>
    
    <meta name="description" content="Fortress miners deals on investment on crytocurrency, and stocks, investing with fortressminers gives you the chance to leverage on their large market data and increase your chances of attaining high financial breakthrough.">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png?ref=4') }}" sizes="16x16">
    <link rel="mask-icon" href="{{ asset('favicon.png') }}" color="#303ed2">
    <meta name="msapplication-TileColor" content="#ff0000">
    <meta name="theme-color" content="#dab779">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Fortressminers | Keeping money safe">
    <meta property="og:site_name" content="Keeping money safe">
    <meta property="og:url" content="fortressminers.com/">
    <meta property="og:description" content="Fortress miners deals on investment on crytocurrency, and stocks, investing with fortressminers gives you the chance to leverage on their large market data and increase your chances of attaining high financial breakthrough.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('visitors1/img/banner.jpg') }}">
    
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;800&amp;display=swap" rel="stylesheet">
    
    <!-- External Libraries -->
    <link rel="stylesheet" href="{{ asset('visitors1/assets/%40fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('visitors1/assets/aos/dist/aos.css') }}">
    
    <!-- Normalize -->
    <style>/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}</style>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('visitors1/css/main1542.css?v=x3.60') }}">
     <link rel="stylesheet" href="{{ asset('visitors1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('visitors1/css/style.css?n=2') }}">
</head>