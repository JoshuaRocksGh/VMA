@extends('layouts.master')


@section('content')
    @php
        $pageTitle = 'Create Candidate';
        $basePath = ' Create';
        $currentPath = 'Create Candidate';
    @endphp
    @include('snippets.pageHeader')


    <div class="dashboard site-card overflow-hidden">
        <div class="tab-content dashboard-body border-info border">
            <div class="p-4">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="#" id="create_presidential_candidates">

                            <div class="card" style="border-radius:15px">


                                <div class="card-body">
                                    <h4 class="text-danger">Create Presidential Candidate</h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group mb-1">
                                                <label class="text-dark">Candidate Name</label>
                                                <input type="text" class="form-control" id="candidate_name" required
                                                    placeholder="Enter Presidential Candidiate Full Name"
                                                    autocomplete="off">
                                            </div>

                                            <div class="form-group mb-1">
                                                <label class="text-dark">Party Name</label>
                                                <input type="text" class="form-control" id="candidate_party_name"
                                                    required placeholder="Enter Presidential Candidiate Party Name"
                                                    autocomplete="off">
                                            </div>

                                            <div class="form-group mb-1">
                                                <label class="text-dark">Candidate Image</label>
                                                <input type="file" class="form-control" id="candidate_image" required
                                                    placeholder="Upload Presidential Candidiate Image" autocomplete="off">
                                            </div>

                                            <div class="form-group mb-1">
                                                <label class="text-dark">Candidate Party Logo</label>
                                                <input type="file" class="form-control" id="candidate_party_logo"
                                                    required placeholder="Upload Candidiate Party Logo" autocomplete="off">
                                            </div>

                                            <br>

                                            <div class="form-group mb-0 text-center">
                                                <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-primary btn-block " type="submit"
                                                            id="create_admin">
                                                            <span class="log_in_text"><b>Create</b></span>
                                                            <span class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                                role="status" aria-hidden="true"
                                                                style="display: none"></span>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                            </div>
                                            <br><br>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card "
                                                style="margin-top:-50px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                                <div class="card-body">
                                                    <div class="form-group mb-2">
                                                        <label class="text-dark">Candidate Name</label><br>
                                                        <span class="summary_candidate_name h6"></span>

                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label class="text-dark">Party Name</label><br>

                                                        <span class="summary_party_name h6"></span>

                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label class="text-dark">Candidate Image</label>
                                                        <div id="imageContainer">
                                                        </div>
                                                        {{--  <span class=""></span>  --}}

                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label class="text-dark">Party Logo</label>
                                                        <div id="imageContainerLogo">
                                                        </div>
                                                        <span class=""></span>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>



                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>


            </div>

        </div>

    </div>
@endsection

@section('scripts')
    @include('extras.datatables')


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        let candidateData = {}
        const formData = new FormData();


        $("#candidate_name").keyup(function() {
            console.log($(this).val());
            $(".summary_candidate_name").text($(this).val())


            candidateData.candidateName = $(this).val()
        })

        $("#candidate_party_name").keyup(function() {
            console.log($(this).val());
            $(".summary_party_name").text($(this).val())

            candidateData.candidatePartyName = $(this).val()
        })

        document.getElementById("candidate_image").addEventListener("change", function(event) {
            // Get the selected file from the input element
            const file = event.target.files[0];
            //console.log("image=", file)
            candidateData.candidateImage = file

            // Ensure a file was selected
            if (file) {
                // Create a FileReader object to read the file contents
                const reader = new FileReader();

                // Set up an event listener to handle the file reading
                reader.onload = function() {
                    // Create a new image element
                    const image = new Image();

                    // Set the source of the image to the data URL
                    image.src = reader.result;
                    image.style.width = "150px"
                    image.style.borderRadius = "10px"
                    image.style.height = "150px" //borderRadius

                    // Display the image in the image container
                    const imageContainer = document.getElementById("imageContainer");
                    imageContainer.innerHTML = ""; // Clear previous content

                    imageContainer.appendChild(image);

                };

                // Read the file as a data URL (Base64)
                reader.readAsDataURL(file);
            }
        });

        document.getElementById("candidate_party_logo").addEventListener("change", function(event) {
            // Get the selected file from the input element
            const file = event.target.files[0];
            candidateData.candidatePartyLogo = file

            // Ensure a file was selected
            if (file) {
                // Create a FileReader object to read the file contents
                const reader = new FileReader();

                // Set up an event listener to handle the file reading
                reader.onload = function() {
                    // Create a new image element
                    const newImage = new Image();

                    // Set the source of the image to the data URL
                    newImage.src = reader.result;
                    newImage.style.width = "150px"
                    newImage.style.borderRadius = "10px"
                    newImage.style.height = "150px" //borderRadius

                    // Display the image in the image container
                    const newImageContainer = document.getElementById("imageContainerLogo");
                    newImageContainer.innerHTML = ""; // Clear previous content

                    newImageContainer.appendChild(newImage);

                };

                // Read the file as a data URL (Base64)
                reader.readAsDataURL(file);
            }
        });

        $("#create_presidential_candidates").submit(function(e) {
            e.preventDefault();

            for (const key in candidateData) {
                if (candidateData.hasOwnProperty(key)) {
                    //console.log("key ==>", key);

                    formData.append(key, candidateData[key]);
                }
            }

            //return;

            console.log("formData=", formData)


            $.ajax({
                type: "POST",
                url: "create-presidential-candidate",
                // url: "./authenticate",
                datatype: "application/json",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(response) {
                    console.log("create candidate=", response)

                }
            })
        })
    </script>
@endsection
