<style>
    .input-span {
        position: absolute;
        top: 0.8rem;
        right: 0.5rem;
        z-index: 222;
    }

    .text-rokel-blue {
        color: #00bdf3 !important
    }
</style>


<div class="site-card px-4 h-100" id="transaction_form"> <br>
    <div class="container">
        <form action="#" id="payment_details_form" autocomplete="off" aria-autocomplete="none">
            @csrf
            <div class="row px-2 justify-content-center">
                <div class="col px-0">

                    {{-- ======================================================= --}}
                    {{-- Own account Area --}}
                    {{-- ======================================================= --}}
                    <div class=" mb-1 ">
                        <label class="text-primary">Account to transfer from</label>

                        <select class="accounts-select" id="from_account" required>
                            <option disabled selected value=""> --- Select Source Account --- </option>
                            @include("snippets.accounts")
                        </select>

                    </div>
                    <hr class="my-2">

                    {{-- ============================================================== --}}
                    {{-- Beneficiary and Onetime Switch --}}
                    {{-- ============================================================== --}}
                    @if ($currentPath === 'Local Bank' || $currentPath === 'Same Bank' || $currentPath ===
                    'International Bank')

                    <div class="mb-2">
                        <ul class="nav w-100 active nav-fill nav-pills" id="onetime_bene_tab" role="tablist">
                            <li class="nav-item w-50" role="presentation" style="position: absolute">
                                <button class="switch w-100  nav-link active" id="beneficiary_tab" data-toggle="pill"
                                    href="#beneficiary_view" type="button" role="tab" aria-controls="beneficiary_view"
                                    aria-selected="false">
                                    Beneficiary</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class=" switch leftbtn w-100 nav-link " id="onetime_tab" data-toggle="pill"
                                    href="#onetime_view" type="button" role="tab" aria-controls="onetime_view"
                                    aria-selected="true">
                                    <div class="switch-text">Onetime</div>
                                </button>
                            </li>

                        </ul>
                    </div>
                    @endif

                    <div class="tab-content" id="onetime_bene_tabContent">


                        {{-- =============================================================== --}}
                        {{-- beneficiary view --}}
                        {{-- =============================================================== --}}

                        @php
                        if ($currentPath === 'Own Account') {
                        $destination = 'Destination A/C';
                        } else {
                        $destination = 'Beneficiary A/C';
                        }
                        @endphp
                        <div class="tab-pane fade show active" id="beneficiary_view" role="tabpanel"
                            aria-labelledby="beneficiary_tab">
                            <div class="col-12">
                                @if ($currentPath === 'Standing Order')
                                <div class="form-group align-items-center row">
                                    <label class="text-primary col-md-4"> Standing Other Type </label>
                                    <div class="col-md-8 px-0"> <select class="form-control  " id="standing_other_type"
                                            required>
                                            <option disabled value=""> -- Select
                                                Type --</option>
                                            <option selected value="own account"> Own Account</option>
                                            <option value="same bank"> Same Bank</option>
                                            <option value="other bank">Other Bank</option>
                                        </select></div>
                                </div>
                                @endif
                                <div class="form-group row align-items-center">
                                    <label class="col-md-4 form-check-label text-primary"> {{ $destination }} </label>
                                    <div class="col-md-8 px-0"> <select data-title=" --- Select {{ $destination}} ---"
                                            data-none-selected-text="--- Select {{ $destination}} ---"
                                            class="form-control select_beneficiary" id="to_account" required>
                                            <option disabled selected value=""> -- Select
                                                {{ $destination }} --</option>
                                            @if ($currentPath === 'Own Account' || $currentPath === "Standing Order")
                                            @include('snippets.accounts')
                                            @endif
                                        </select></div>
                                </div>
                                @if ($currentPath === 'Local Bank' || $currentPath === 'International Bank' ||
                                $currentPath === 'Standing Order')
                                <div class="form-group align-items-center row bank_div">
                                    <label class="text-primary  col-md-4">{{ $destination }} Bank</label>
                                    <input
                                        class="form-control  text-input col-md-8 display_to_account display_to_account_bank "
                                        type="text" id="beneficiary_bank_name" disabled>
                                </div>
                                @endif
                                <div class="form-group align-items-center row">
                                    <label class="col-md-4 text-primary"> {{ $destination }}
                                        Number</label>
                                    <input type="text"
                                        class="form-control  text-input  display_to_account display_to_account_no col-md-8 "
                                        id="saved_beneficiary_account_number" disabled>
                                </div>

                                <div class="form-group align-items-center row">
                                    <label class="col-md-4 text-primary"> {{ $destination }} Name</label>
                                    <input type="text"
                                        class="form-control  text-input display_to_account display_to_account_name col-md-8  "
                                        id="saved_beneficiary_name" disabled>
                                </div>
                                @if ($currentPath !== 'Own Account')
                                <div class="form-group align-items-center row email-div">
                                    <label class="col-md-4 text-primary"> {{ $destination }} Email</label>
                                    <input type="text"
                                        class="form-control  text-input display_to_account display_to_receiver_email col-md-8 "
                                        id="saved_beneficiary_email" disabled>
                                </div>
                                @endif
                                @if ($currentPath === 'Local Bank' || $currentPath === 'International Bank')
                                <div class="row align-items-center mb-1">
                                    <label class="text-primary col-md-4">Beneficiary Address</label>
                                    <input class="form-control  text-input col-md-8  " type="text"
                                        id="beneficiary_address" disabled>
                                </div>
                                @endif
                            </div>
                        </div>
                        {{-- =============================================================== --}}
                        {{-- onetime view --}}
                        {{-- =============================================================== --}}

                        @if ($currentPath === 'Local Bank' || $currentPath === 'Same Bank' || $currentPath ===
                        'International Bank')
                        <div class="tab-pane fade" id="onetime_view" role="tabpanel" aria-labelledby="onetime_tab">
                            <div class="col-12">
                                @if ($currentPath === 'International Bank')
                                <div class="row align-items-center mb-1">
                                    <label class="text-primary col-md-4">Bank Country</label>
                                    <div class="px-0 col-md-8"> <select class="form-control "
                                            id="onetime_select_country" required>
                                            <option disabled selected>--- Not Selected ---</option>

                                        </select></div>
                                </div>
                                @endif
                                @if ($currentPath === 'Local Bank' || $currentPath === 'International Bank')
                                <div class="row align-items-center mb-1">
                                    <label class="text-primary col-md-4  ">Transfer Bank</label>
                                    <div class="col-md-8 px-0"><select class="form-control " id="onetime_select_bank"
                                            required>
                                            <option disabled selected>--- Not Selected ---</option>

                                        </select></div>
                                </div>
                                @endif
                                <div class="form-group align-items-center row">
                                    <label class="col-md-4 text-primary"> Beneficiary A/C
                                        Number</label>
                                    <input type="text" class="form-control  text-input col-md-8 "
                                        id="onetime_account_number" placeholder="Enter Account Number"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                @if ($currentPath === 'Same Bank')
                                <div class="form-group align-items-center row">
                                    <label class="col-md-4  text-primary"> Beneficiary A/C Name</label>
                                    <div class="input-group px-0 col-md-8" style="position: relative">
                                        <input type="text" class="form-control  text-input  onetime_beneficiary_name"
                                            placeholder="Beneficiary Name" id="onetime_beneficiary_name" disabled>
                                        <span class="spinner-grow-sm input-span  spinner-grow text-rokel-blue"
                                            role="status" id="onetime_beneficiary_name_loader" style="display: none">
                                            {{-- <span class="sr-only">Loading...</span> --}}
                                        </span>
                                    </div>
                                </div>
                                @else
                                <div class="form-group align-items-center row">
                                    <label class="col-md-4 text-primary"> Beneficiary A/C Name</label>
                                    <input type="text" class="form-control  text-input col-md-8"
                                        placeholder="Enter Beneficiary Name" id="onetime_beneficiary_name">
                                </div>


                                @endif
                                <div class="form-group align-items-center row">
                                    <label class="col-md-4 text-primary"> Beneficiary Email</label>
                                    <input type="text" class="form-control text-input col-md-8 "
                                        id="onetime_beneficiary_email" placeholder="Enter Beneficiary Email">
                                </div>
                                @if ($currentPath === 'Local Bank' || $currentPath === 'International Bank')
                                <div class="row align-items-center mb-1">
                                    <label class="text-primary col-md-4">Beneficiary Address</label>
                                    <input class="form-control text-input col-md-8" type="text"
                                        id="onetime_beneficiary_address" placeholder="Enter Beneficiary Address">
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>



                    {{-- =============================================================== --}}
                    {{-- Rest of the Form --}}
                    {{-- =============================================================== --}}

                    <div class="col-12">

                        <div class="form-group align-items-center row">

                            <label class="col-md-4 text-primary"> Amount</label>

                            <div class="input-group mb-1 col-md-8" style="padding: 0px;">
                                <div class="input-group-prepend">
                                    @if ($currentPath !== 'International Bank')
                                    <input type="text" placeholder="SLL" class="input-group-text account_currency "
                                        style="width: 80px;" disabled>
                                    @endif
                                    @if ($currentPath === 'International Bank')

                                    <select class="" style="width: 100px;" id="transfer_currency" required>
                                        <option value="SLL">SLL</option>
                                    </select>
                                    @endif
                                </div>

                                &nbsp;&nbsp;
                                <input type="text" class="form-control text-input  "
                                    placeholder="Enter Amount To Transfer" id="amount"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                    required>
                            </div>
                        </div>

                        @if ($currentPath === 'Local Bank')
                        <div class="form-group align-items-center row">
                            <label class="text-primary col-md-4 "> Transfer Mode</label>
                            <div class="col-md-8 px-0">
                                <select class="form-control  " id="transfer_mode" required>
                                    <option disabled selected> -- Select Transfer Mode --
                                    </option>
                                    <option value="ACH">ACH</option>
                                    <option value="RTGS">RTGS</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        @if ($currentPath === 'Standing Order')

                        <div class="form-group align-items-center row mb-3">
                            <label class=" col-md-4 text-primary">Start Date</label>
                            <input type="date" class="form-control text-input col-md-8" min="01-01-1997"
                                max="31-12-2030" id="so_start_date" required>
                        </div>
                        <div class="form-group align-items-center row mb-3">
                            <label class=" col-md-4 text-primary">End Date</label>
                            <input type="date" class="form-control text-input col-md-8" id="so_end_date" required>
                        </div>
                        <div class="form-group align-items-center row">
                            <label class="col-md-4 text-primary">Frequency</label>
                            <div class="col-md-8 px-0"> <select class=" form-control  so_frequency"
                                    id="beneficiary_frequency" placeholder="Select Pick Up Branch" required>
                                    <option disabled selected value="">--Select Frequency--
                                    </option>
                                </select></div>
                        </div>
                        @endif
                        @if ($currentPath !== 'Standing Order')
                        <div class="form-group align-items-center row">
                            <label class="col-md-4 text-primary">Purpose of Transfer
                            </label>
                            <input type="text" class="form-control text-input col-md-8" id="purpose"
                                placeholder="Enter purpose of transaction" class="form-group row mb-3">
                        </div>
                        @endif
                        <div class="form-group align-items-center row">
                            <label class="text-primary col-4">Expense Category
                            </label>
                            {{-- <input type="hidden" value="Others" id="category_"> --}}


                            <div class="col-md-8 px-0"> <select class="  " id="category" required>
                                    <option disabled selected value="">-- Select expense
                                        category --
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right yes_beneficiary">
                        <button class="btn btn-primary next-button btn-rounded" type="button" id="next_button">
                            &nbsp; Next &nbsp;<i class="fe-arrow-right"></i></button>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
{{-- <div class="form-group row">
    <b class="col-md-4 text-primary"> Cur / Rate / Amount</b>
    <div class="input-group mb-1 col-md-8" style="padding: 0px;">
        <div class="input-group-prepend">
            <select name="" class="input-group-text select_conversion_currency" id="conversion_currency">
            </select>
        </div>
        &nbsp;&nbsp;
        <div class="input-group-prepend">
            <input type="text" class="form-control readOnly " id="convertor_rate" value="1.00" style="width: 80px;"
                readonly>
        </div>
        &nbsp;&nbsp;
        <input type="text" class="form-control" id="converted_amount" placeholder="Converted Amount"
            aria-label="converted_amount" aria-describedby="basic-addon1" readonly>
    </div>
</div> --}}