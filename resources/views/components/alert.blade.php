<div>
    @if(Session::has('alert'))
        <script>
            toastr.options = 
            {
                "closeButton": true,                    
                "progressBar": true
            }

            var messageType = "{{ session('alert')['type'] ?? 'success' }}";
            var messageText = "{{ session('alert')['message'] }}";

            toastr[messageType](messageText);
            // Swal.fire(
            //     messageText,
            //     '',
            //     messageType
            //     )
        </script>
    @endif
</div>