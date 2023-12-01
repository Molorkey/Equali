<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equali | Overview </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@100;300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


</head>

<body>
    <div class="min-h-screen  bg-[#EEF4F6]">

        @include('layout.sidenav')
        <div class="ml-[218px] w-auto  text-black flex justify-between ">
            <div class="mt-4">
                <h1 class="text-[#1D489A] font-poppins font-medium text-[24px] mx-8">Welcome, Name Here👋</h1>
                <p class="text-[#718297] text-[12px] font-raleway font-normal mx-8 mb-4">Check your info here</p>
            </div>
        
            <div class="mt-4">
                <form class="w-[400px]" method="get" action="">
                    @csrf
        
                   
                    <div class="relative w-full">
                    <input type="text" name="searchTerm" placeholder="Search Here" class="px-12 py-2 pl-10 pr-10 w-full rounded-[16px]">
                    <i class='bx bx-search text-gray-500 bx-sm absolute left-3 top-1/2 transform -translate-y-1/2'></i>
                    <i class='bx bx-category-alt bx-sm text-gray-500 bx-sm absolute right-3 top-1/2 transform -translate-y-1/2'></i>
                    </div>
                </form>
            </div>
            
            <div class="mt-6">
                <h1>{{ now()->format('F j, Y') }}</h1>
              
            </div>
        
            <div class="mt-6 mx-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M19 13.586V10C19 6.783 16.815 4.073 13.855 3.258C13.562 2.52 12.846 2 12 2C11.154 2 10.438 2.52 10.145 3.258C7.185 4.074 5 6.783 5 10V13.586L3.293 15.293C3.19996 15.3857 3.12617 15.4959 3.07589 15.6172C3.0256 15.7386 2.99981 15.8687 3 16V18C3 18.2652 3.10536 18.5196 3.29289 18.7071C3.48043 18.8946 3.73478 19 4 19H20C20.2652 19 20.5196 18.8946 20.7071 18.7071C20.8946 18.5196 21 18.2652 21 18V16C21.0002 15.8687 20.9744 15.7386 20.9241 15.6172C20.8738 15.4959 20.8 15.3857 20.707 15.293L19 13.586ZM19 17H5V16.414L6.707 14.707C6.80004 14.6143 6.87383 14.5041 6.92412 14.3828C6.9744 14.2614 7.00019 14.1313 7 14V10C7 7.243 9.243 5 12 5C14.757 5 17 7.243 17 10V14C17 14.266 17.105 14.52 17.293 14.707L19 16.414V17ZM12 22C12.6193 22.0008 13.2235 21.8086 13.7285 21.4502C14.2335 21.0917 14.6143 20.5849 14.818 20H9.182C9.38566 20.5849 9.76648 21.0917 10.2715 21.4502C10.7765 21.8086 11.3807 22.0008 12 22Z"
                        fill="#626B7F" />
                    <circle cx="18" cy="8" r="4" fill="#EA3332" />
                </svg>
            </div>
        </div>


        <section class="ml-[218px] main ">

            <div class="bg-white mx-4  rounded-lg overflow-x-auto h-[600px]">


                <table class="min-w-full ">
                    <thead>
                        <tr class="border-b-2 border-[#718297]">
                            <th
                                class="px-6 py-4 text-left text-xl font-poppins font-bold text-[#26386A] uppercase tracking-wider">
                                Applicant Name
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xl font-poppins font-bold text-[#26386A] uppercase tracking-wider">
                                Interview Results
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xl font-poppins font-bold  text-[#26386A] uppercase tracking-wider">
                                Admission Results
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xl font-poppins font-bold  text-[#26386A] uppercase tracking-wider">
                                Qualifying Results</th>


                            <th
                                class="px-6 py-4 text-left text-xl font-poppins font-bold  text-[#26386A] uppercase tracking-wider">
                                Weighted Average</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if ($results->count() == 0)
                            <tr class="">
                                <td></td>   
                                <td></td>
                                <td class="text-center py-2">

                                    <p>No Data found in the database</p>

                                </td>
                                <td></td>
                            </tr>
                        @else
                            @foreach ($results as $result)
                           
                                <tr>
                                   
                                    <td class="px-6 py-2  whitespace-nowrap">
                                        <p class="font-medium font-poppins text-[#617388]">
                                            {{$result->user->first_name}},   {{$result->user->last_name}}
                                        </p>
                                    </td>

                                    <td class="px-6 py-2  whitespace-nowrap ">
                                        <p class="font-medium font-poppins  text-[#617388]">
                                            @if (empty($result->measure_a_score))
                                                N/A
                                            @else
                                                {{ $result->measure_a_score }}
                                            @endif

                                        </p>
                                    </td>

                                    <td class="px-6 py-2  whitespace-nowrap">
                                        <p class="font-medium font-poppins text-[#617388]">
                                            @if (empty($result->measure_b_score))
                                                N/A
                                            @else
                                                {{ $result->measure_b_score }}
                                            @endif
                                        </p>
                                    </td>

                                    <td class="px-6 py-2  whitespace-nowrap">
                                        <p class="font-medium font-poppins text-[#617388]">
                                            @if (empty($result->measure_c_score))
                                                N/A
                                            @else
                                                {{ $result->measure_c_score }}
                                            @endif
                                        </p>
                                    </td>

                                    <td class="px-6 py-2  whitespace-nowrap">
                                        <p class="font-medium font-poppins text-[#617388]">
                                            @if ($result->weighted_average)
                                                {{$result->weighted_average}}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                               
                               
                            @endforeach
                        @endif



                    </tbody>
                </table>
                <div>

                </div>
            </div>
        </section>

    </div>

</body>

</html>