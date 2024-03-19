   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{asset('admin')}}/plugins/daterangepicker/daterangepicker.css">
   <script>
       $(function() {
           $("#birthday").datepicker({
               dateFormat: 'dd/mm/yy'
           });
       });
   </script>
   <x-app-layout>
       <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Profile') }}
           </h2>
       </x-slot>

       <div class="py-12">
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
               <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                   <div class="max-w-xl">
                       @include('profile.partials.update-profile-information-form')
                   </div>
               </div>

               <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                   <div class="max-w-xl">
                       @include('profile.partials.update-password-form')
                   </div>
               </div>

               <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                   <div class="max-w-xl">
                       @include('profile.partials.delete-user-form')
                   </div>
               </div>
           </div>
       </div>
   </x-app-layout>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <!-- daterangepicker -->
   <script src="{{asset('admin')}}/plugins/moment/moment.min.js"></script>
   <script src="{{asset('admin')}}/plugins/daterangepicker/daterangepicker.js"></script>