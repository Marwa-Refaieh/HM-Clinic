@extends('demo.demo-layouts.master')

@section('title')
    Appointment
@stop


@section('css')
    <link href="{{ URL::asset('demo/css/appointment.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('demo/css/media query/appointment.css') }}" rel="stylesheet">
@stop

@section('content')
    <a id="button"></a>
    <!-- Start Section Hero-->
    <section class="hero is-success">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <div id="particles-js"></div>
            @include('demo.demo-layouts.main-header')
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body ">
            <div class="container ">
                <div class="columns">
                    <div class="column has-text-centered ">
                        <h1
                            class="is-size-2-desktop is-size-2-tablet is-size-4-mobile has-text-weight-bold is-capitalized ">
                            knowledge to power your website</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Hero-->

    <!-- start sectoin form -->
    <section class="section appointment">
        <h3 class="title is-1 is-relative mb-6 title-appointment has-text-centered">Make Appointment</h3>
        <div class="container has-background-light is-max-desktop is-relative is-clipped">
            <h1 class="mb-4 has-text-centered is-size-2 flex-start mt-5 pt-5">Fill The Following Information</h1>
            <div class="pt-3 line has-text-centered pt-0 is-flex is-justify-content-space-evenly is-align-items-flex-start">
                <span class="step "><span class="is-size-5">1</span></span>
                <span class="step "><span class="is-size-5">2</span></span>
                <span class="step "><span class="is-size-5">3</span></span>
            </div>
            <div class="tab mt-4 form1">
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <input type="hidden" placeholder="doctor_id" value="{{ $doctor->id }}"
                            class="inputs"id="doctor_id" name="doctor_id">
                        <input type="hidden" placeholder="user_id" class="inputs" id="user_id" name="user_id">
                    </div>
                    <div class="column is-12">
                        <div class="field">
                            <label class="label label-tab1">first name</label>
                            <div class="control">
                                <p><input type="text" class="inputs" placeholder="First name..."
                                        oninput="this.className = ''" id="fname" name="fname" required></p>
                            </div>
                        </div>
                    </div>
                    <div class="column is-12">
                        <div class="field">
                            <label class="label label-tab1">last name</label>
                            <div class="control">
                                <p><input type="text" class="inputs" placeholder="Last name..."
                                        oninput="this.className = ''" id="lname" name="lname" required></p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="column is-4">
                        <div class="field">
                            <label class="label label-tab1">Age</label>
                            <div class="control ">
                                <p><input class="inputs" placeholder="Your Age" oninput="this.className = ''" id="birth"
                                        name="birth"></p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="column is-4">
                        <label class="label label-tab1">Birth </label>
                        <div class="field ">
                            <div class="control">
                                <input type="date" oninput="this.className = ''" id="birth" name="birth" required>
                            </div>
                        </div>
                    </div>

                    <div class="column is-4 ">
                        <label class="label label-tab1"> Gender</label>
                        <div class="select select-tab1">
                            <select class="select-design option-remove" name="gender" id="gender" required>
                                <option value="" disabled selected hidden>Select Below :</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>

                    <div class="column is-4">
                        <label class="label label-tab1"> Martial Statues</label>
                        <div class="select select-tab1 is-normal">
                            <select class="select-design option-remove" id="marital_status" name="marital_status" required>
                                <option value="" disabled selected hidden>Select Below :</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>
                    </div>

                        {{-- <div class="column is-12">
                            <label class="label label-tab1"> Address</label>
                            <div class="field has-addons">
                                <div class="control is-expanded">
                                    <div class="select is-fullwidth">
                                        <select name="address" class="select-design" id="address" required>
                                            <option value="" disabled selected hidden>Select Area :</option>
                                            <option value="zahira">Zahira</option>
                                            <option value="bolivia">Bolivia</option>
                                            <option value="brazil">Brazil</option>
                                            <option value="chile">Chile</option>
                                            <option value="colombia">Colombia</option>
                                            <option value="ecuador">Ecuador</option>
                                            <option value="guyana">Guyana</option>
                                            <option value="paraguay">Paraguay</option>
                                            <option value="peru">Peru</option>
                                            <option value="suriname">Suriname</option>
                                            <option value="uruguay">Uruguay</option>
                                            <option value="venezuela">Venezuela</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    <div class="column is-6 ">
                        <div class="field">
                            <label class="label label-tab1"> Phone Number</label>
                            <div class="field has-addons">
                                <p class="control ">
                                    <a class="button is-static">
                                        +963
                                    </a>
                                </p>
                                <p class="control is-expanded">
                                    <input class="input select-design" type="tel" placeholder="Your phone number"
                                        oninput="this.className = ''" id="phone_number" name="phone_number" required>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-6 ">
                        <div class="field">
                            <label class="label label-tab1"> Email</label>
                            <div class="field has-addons">
                                <p class="control is-expanded">
                                    <input class="input select-design" type="tel" placeholder="Your phone number"
                                        oninput="this.className = ''" id="email" name="email" required>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-12">
                        <label class="label label-tab1"> Address</label>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="address" class="select-design" id="address" required>
                                        <option value="" disabled selected hidden>Select Area :</option>
                                        <option value="zahira">Zahira</option>
                                        <option value="bolivia">Bolivia</option>
                                        <option value="brazil">Brazil</option>
                                        <option value="chile">Chile</option>
                                        <option value="colombia">Colombia</option>
                                        <option value="ecuador">Ecuador</option>
                                        <option value="guyana">Guyana</option>
                                        <option value="paraguay">Paraguay</option>
                                        <option value="peru">Peru</option>
                                        <option value="suriname">Suriname</option>
                                        <option value="uruguay">Uruguay</option>
                                        <option value="venezuela">Venezuela</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-button mt-6">
                    <div class="is-flex is-justify-content-flex-end">
                        <button class="button is-normal  is-size-5 " type="button" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button class="button is-normal  is-size-5 " id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div>

            <div class="tab mt-6 form2">
                <div class="columns mx-0 date-time is-multiline">
                    <div class="column is-12 p-0">
                        <label class="label label-tab1">Select Date </label>
                        <div class="field ">
                            <div class="control">
                                <input type="date" oninput="this.className = ''" id="date" name="date"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="column px-0 mt-6">
                        <div class="field">
                            <label class="label label-tab1"> Select Time</label>
                            <div class="control">
                                <p>
                                <div class="select is-fullwidth mr-3">
                                    <select class="select-design mobile" id="time" name="time" required>
                                        {{-- <option value=""  selected hidden>Times :</option> --}}
                                    </select>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <label class="label label-tab2 mt-4 label-tab1">Do You Wnat Remote Treatment or Come To The Clinic
                    :</label>
                <div class="columns mx-0 ">
                    <div class="column is-7 p-0 mt-4 ">
                        <div class="field ">
                            <div class="control">
                                <input class="check-for-cure" type="radio" id="myCheck" name="check"
                                    value="1" onclick="myFunction()" required> online
                            </div>
                        </div>
                        <p id="text" class="label-tab1" style="display:none">Complete the following procedures and
                            you
                            will receive a link to start the session .</p>
                    </div>
                    <div class="column is-5 p-0 mt-4">
                        <div class="field ">
                            <div class="control">
                                <input class="check-for-cure" type="radio" id="myCheck1" name="check"
                                    value="0" onclick="myFunction()" required> in clinic
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button mt-6">
                    <div class="is-flex is-justify-content-flex-end">
                        <button class="button is-normal  is-size-5 " type="button" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button class="button is-normal  is-size-5 " id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div>

            <div class="tab mt-6 form3">
                <label class="label mb-5 label-tab1">Reservayion By Bank Card :</label>
                <div class="columns is-multiline">
                    <div class="column is-7 ">
                        <div class="field">
                            <label class="label label-tab1"> Bank Name</label>
                            <div class="control">
                                <p>
                                <div class=" select  is-normal">
                                    <select class="select-design bank is-fullwidth is-normal-mobile select-tab3"
                                        id="input1" onclick="disableElement1()" id="bankname" required>
                                        <option value="" disabled selected>Bank :</option>
                                        <option>Al Sham Bank</option>
                                        <option>Al Baraka Bank</option>
                                        <option>France Bank</option>
                                        <option>AL Shark Bank</option>
                                    </select>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-5">
                        <div class="field">
                            <label class="label label-tab1">Card Number</label>
                            <div class="control">
                                <p><input placeholder="#222-333-444" class="bank" id="input2"
                                        onclick="disableElement1()" id="cardnum" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-4">
                        <div class="field">
                            <label class="label label-tab1">Card Password</label>
                            <div class="control">
                                <p><input type="password" class="bank" id="input3" onclick="disableElement1()"
                                        id="cardpass" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-4">
                        <div class="field">
                            <label class="label label-tab1">CVV Code</label>
                            <div class="control">
                                <p><input type="text" class="bank" id="input4" onclick="disableElement1()"
                                        id="cvvcode" required>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-4">
                        <div class="field">
                            <label class="label label-tab1">Pricing</label>
                            <div class="control">
                                <p><input type="number" disabled value="{{ $doctor->avarage_price }}"
                                        class="bank pricing" onclick="disableElement1()" id="priceBank" required>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <label class="label mb-5 mt-5 label-tab1">Reservayion By Mobile :</label>
                <div class="columns is-multiline">
                    <div class="column is-7 ">
                        <div class="field">
                            <label class="label label-tab1"> Cash Mobile</label>
                            <div class="control">
                                <p>
                                <div class="select  is-normal">
                                    <select class="select-design mobile is-normal-mobile select-tab3" id="input6"
                                        onclick="disableElement2()" id="cashmobile" required>
                                        <option value="" disabled selected>Cash :</option>
                                        <option>Syriatel Cash</option>
                                        <option>MTN Cash</option>
                                    </select>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-5">
                        <div class="field">
                            <label class="label label-tab1">Center Accont Number</label>
                            <div class="control">
                                <p><input type="text" class="mobile" id="input7" onclick="disableElement2()"
                                        id="centeraccountnum" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-6">
                        <div class="field">
                            <label class="label label-tab1">Account</label>
                            <div class="control">
                                <p><input type="email" placeholder="user@gmail.com" class="mobile" id="input8"
                                        onclick="disableElement2()" id="account" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-6">
                        <div class="field">
                            <label class="label label-tab1">Account Password</label>
                            <div class="control">
                                <p><input type="password" class="mobile" id="input9" onclick="disableElement2()"
                                        id="accountpass" required></p>
                            </div>
                        </div>
                    </div>

                    <div class="column is-12">
                        <div class="field">
                            <label class="label label-tab1">Pricing</label>
                            <div class="control">
                                <p><input type="number" disabled value="{{ $doctor->avarage_price }}"
                                        class="mobile pricing" id="input10" onclick="disableElement2()"
                                        id="priceMobile" required></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button mt-6">
                    <div class="is-flex is-justify-content-flex-end">
                        <button class="button is-normal  is-size-5 " type="button" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button class="button is-normal  is-size-5 nextBtn" type="button" id="submitBtn">Submit</button>
                    </div>
                </div>
            </div>

            {{-- تم تعليق الأزرار و وضع في كل form الأزرار بشكل منفص من أجل تحكم بزر الإرسال بشكل مختلف عن الباقي  --}}
            {{-- <div class="form-button mt-6">
                <div class="is-flex is-justify-content-flex-end">
                    <button class="button is-normal  is-size-5 " type="button" id="prevBtn"
                        onclick="nextPrev(-1)">Previous</button>
                    <button class="button is-normal  is-size-5 " id="nextBtn" onclick="nextPrev(1)"></button>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- end section form -->
@stop




@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script>
        // response userid
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '/userId',
                dataType: 'json',
                success: function(data) {
                    let user_id = data.user_id;
                    // console.log(userId);
                    $('#user_id').val(user_id);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        // request date / reponse time
        $(document).ready(function() {
            // add an event listener to the date input element
            $('#date').on('change', function() {
                let dateValue = $(this).val();

                let doctor_id = $('#doctor_id').val();
                let timesSelect = $('#time');
                // console.log(dateValue);
                // clear the current options in the times select element
                timesSelect.empty();
                // send an AJAX request to the server to get the available times for the selected date
                $.ajax({
                    url: '/time/' + doctor_id,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        date: dateValue
                    },
                    success: function(response) {
                        // add the available times as options to the times select element
                        response.forEach(times => {
                            let option = $('<option></option>').attr('value', times)
                                .text(times);
                            timesSelect.append(option);

                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch available times:', error);
                    }
                });
            });
        });






        // تم تعريف كمتغيرات عامة للوصول إليها من أي مكان
        let gender = '';
        let marital_status = '';
        let address = '';
        let time = '';

        $(document).ready(function() {
            // تعيين حدث النقر للعنصر select
            $('.option-remove').on('click', function() {
                // إزالة الخيار "اختر " عند النقر عليه
                $(this).find('option:first').prop('disabled', true).siblings().prop('disabled', false);
            });

            // تعيين حدث التغيير للعنصر select
            $('#gender').on('change', function() {
                gender = $(this).val();
            });

            $('#marital_status').on('change', function() {
                marital_status = $(this).val();
            });

            $('#address').on('change', function() {
                address = $(this).val();
            });

            $('#time').on('change', function() {
                time = $(this).val();
            });


            $("#submitBtn").click(function() {

                let formData = new FormData();
                let fname = $("#fname").val();
                let lname = $("#lname").val();
                let birthVal = $("#birth").val();
                let birth = moment(birthVal).format("MM/DD/YYYY");
                let phone_number = $("#phone_number").val();
                let dateVal = $("#date").val();
                let date = moment(dateVal).format("MM/DD/YYYY");
                let remotely = $("input[name='check']:checked").val();
                let pricing = $(".pricing").val();
                let doctor_id = $("#doctor_id").val();
                let user_id = $("#user_id").val();
                let email = $("#email").val();

                formData.append("fname", fname);
                formData.append("lname", lname);
                formData.append("gender", gender);
                formData.append("marital_status", marital_status);
                formData.append("phone_number", phone_number);
                formData.append("address", address);
                formData.append("time", time);
                formData.append("birth", birth);
                formData.append("date", date);
                formData.append("pricing", pricing);
                formData.append("doctor_id", doctor_id);
                formData.append("user_id", user_id);
                formData.append("remotely", remotely);
                formData.append("email", email);

                $.ajax({
                    type: "POST",
                    url: "/appointment/add",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        if (response.status == true) {
                            toastr.success('Have fun storming the castle!', 'Miracle Max Says');
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // احصل على جميع الحقول المطلوبة في الصفحة
                        const requiredFields = document.querySelectorAll(
                            'input[required], select[required]');

                        // تحقق من قيمة كل حقل مطلوب وتغيير الحدود وإضافة رسالة الخطأ إلى خاصية title
                        requiredFields.forEach(field => {
                            if (!field.value && !field.disabled) {
                                // تحقق من عدم وجود قيمة في العنصر المحدد في عنصر select
                                if (field.tagName === 'SELECT' && (field
                                        .selectedIndex === 0 || field.options[field
                                            .selectedIndex].value === '')) {
                                    const errorMessage =
                                        'يرجى اختيار خيار واحد على الأقل.';
                                    field.style.border = '2px solid red';
                                    field.title = errorMessage;
                                } else {
                                    const errorMessage = 'يرجى تعبئة هذا الحقل.';
                                    field.style.border = '2px solid red';
                                    field.title = errorMessage;
                                }
                            }

                            // عند اقتراب المؤشر من الحقل، تظهر رسالة الخطأ كنص مطابق للخاصية title
                            field.addEventListener('mouseover', () => {
                                field.focus();
                            });

                            // إعادة تعيين الحدود وإزالة رسالة الخطأ عند كتابة القيمة في الحقل
                            field.addEventListener('input', () => {
                                if (field.value) {
                                    // إزالة أسلوب الحدود الحمراء عندما يتم اختيار عنصر صحيح في select
                                    if (field.tagName === 'SELECT' && (field
                                            .selectedIndex !== 0 || field
                                            .options[field.selectedIndex]
                                            .value !== '')) {
                                        field.classList.remove('error');
                                    }
                                    field.style.border = '';
                                    field.title = '';
                                }
                            });

                            // تحقق من عدم حدوث تغيير في select وعدم اختيار أي عنصر غير العنصر الأول
                            if (field.tagName === 'SELECT' && field.required) {
                                field.addEventListener('blur', () => {
                                    if (field.selectedIndex === 0) {
                                        const errorMessage =
                                            'يرجى اختيار خيار واحد على الأقل.';
                                        field.style.border = '2px solid red';
                                        field.title = errorMessage;
                                    }
                                });
                            }
                        });

                        const radioButtons = document.querySelectorAll(
                            'input[type="radio"][required]');
                        const radioGroupName = radioButtons[0].name;

                        radioButtons.forEach(radioButton => {
                            radioButton.addEventListener('change', () => {
                                const errorMessage =
                                    'يرجى اختيار خيار واحد على الأقل.';
                                const radioGroup = document.getElementsByName(
                                    radioGroupName);

                                if (!document.querySelector(
                                        `input[name="${radioGroupName}"]:checked`
                                    )) {
                                    radioGroup.forEach(radio => {
                                        radio.style.outline =
                                            '2px solid red';
                                        radio.title = errorMessage;
                                    });
                                } else {
                                    radioGroup.forEach(radio => {
                                        radio.style.outline = '';
                                        radio.title = '';
                                    });
                                }
                            });
                        });
                    }
                });
            });
        });

        // console.log('marwa');
        // let gender = $("#gender").find(":selected").val();
        // let marital_status = $("#marital_status").find(":selected").val();
        // let address = $("#address").find(":selected").val();

        // console.log(fname);
        // console.log(lname);
        // console.log(birth);
        // console.log(phone_number);
        // console.log(gender);
        // console.log(marital_status);
        // console.log(address);
        // console.log(time);
        // console.log(date);
        // console.log(remotely);
        // console.log(pricing);
    </script>








    <script src="{{ URL::asset('demo/js/appointment.js') }}"></script>
    {{-- <script src="{{ URL::asset('demo/js/doctors.js') }}"></script> --}}
@stop










<!-- clock-show class cuz dont change the  basic faild in other input -->
<!-- margen-left in column in form 2 cuz to change the default value bulma (default value was margin all 12) -->
<!-- is (is-expanded) in tel input , cuz whith out it the input dont be in all lenght of row -->
