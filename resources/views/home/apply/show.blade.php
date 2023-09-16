@extends('home.layouts.home')
@section('title',__('Apply'))

@section('style')
    <link href="{{ asset('css/home/apply.css') }}" rel="stylesheet">

@endsection
@section('script')


    <script src="https://cdn01.jotfor.ms/static/prototype.forms.js?3.3.39971" type="text/javascript"></script>
    <script src="https://cdn02.jotfor.ms/static/jotform.forms.js?3.3.39971" type="text/javascript"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.js"></script>
    <script src="https://cdn03.jotfor.ms/js/vendor/jquery-1.8.0.min.js?v=3.3.39971" type="text/javascript"></script>
    <script defer src="https://cdn01.jotfor.ms/js/vendor/maskedinput.min.js?v=3.3.39971" type="text/javascript"></script>
    <script defer src="https://cdn02.jotfor.ms/js/vendor/jquery.maskedinput.min.js?v=3.3.39971" type="text/javascript">
    </script>
    <script type="text/javascript">
        JotForm.newDefaultTheme = true;
        JotForm.extendsNewTheme = false;
        JotForm.singleProduct = false;
        JotForm.newPaymentUIForNewCreatedForms = false;
        JotForm.newPaymentUI = true;
        JotForm.submitError = "jumpToFirstError";

        JotForm.init(function() {
            /*INIT-START*/
            setTimeout(function() {
                $('input_6').hint('ex: myname@example.com');
            }, 20);
            JotForm.setPhoneMaskingValidator('input_7_full', '(###) ###-####');
            if (window.JotForm && JotForm.accessible) $('input_13').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_95').setAttribute('tabindex', 0);

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday",
                "Sunday"
            ];
            JotForm.calendarOther = {
                "today": "Today"
            };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function(e) {
                    setTimeout(function() {
                        JotForm.setCalendar("94", false, {
                            "days": {
                                "monday": true,
                                "tuesday": true,
                                "wednesday": true,
                                "thursday": true,
                                "friday": true,
                                "saturday": true,
                                "sunday": true
                            },
                            "future": true,
                            "past": true,
                            "custom": false,
                            "ranges": false,
                            "start": "",
                            "end": ""
                        });
                    }, 0);
                });
            }
            JotForm.onTranslationsFetch(function() {
                JotForm.setCalendar("94", false, {
                    "days": {
                        "monday": true,
                        "tuesday": true,
                        "wednesday": true,
                        "thursday": true,
                        "friday": true,
                        "saturday": true,
                        "sunday": true
                    },
                    "future": true,
                    "past": true,
                    "custom": false,
                    "ranges": false,
                    "start": "",
                    "end": ""
                });
            });
            if (window.JotForm && JotForm.accessible) $('input_96').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_19').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_97').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_41').setAttribute('tabindex', 0);

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday",
                "Sunday"
            ];
            JotForm.calendarOther = {
                "today": "Today"
            };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function(e) {
                    setTimeout(function() {
                        JotForm.setCalendar("98", false, {
                            "days": {
                                "monday": true,
                                "tuesday": true,
                                "wednesday": true,
                                "thursday": true,
                                "friday": true,
                                "saturday": true,
                                "sunday": true
                            },
                            "future": true,
                            "past": true,
                            "custom": false,
                            "ranges": false,
                            "start": "",
                            "end": ""
                        });
                    }, 0);
                });
            }
            JotForm.onTranslationsFetch(function() {
                JotForm.setCalendar("98", false, {
                    "days": {
                        "monday": true,
                        "tuesday": true,
                        "wednesday": true,
                        "thursday": true,
                        "friday": true,
                        "saturday": true,
                        "sunday": true
                    },
                    "future": true,
                    "past": true,
                    "custom": false,
                    "ranges": false,
                    "start": "",
                    "end": ""
                });
            });
            if (window.JotForm && JotForm.accessible) $('input_99').setAttribute('tabindex', 0);

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August",
                "September", "October", "November", "December"
            ];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday",
                "Sunday"
            ];
            JotForm.calendarOther = {
                "today": "Today"
            };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function(e) {
                    setTimeout(function() {
                        JotForm.setCalendar("30", false, {
                            "days": {
                                "monday": true,
                                "tuesday": true,
                                "wednesday": true,
                                "thursday": true,
                                "friday": true,
                                "saturday": true,
                                "sunday": true
                            },
                            "future": true,
                            "past": true,
                            "custom": false,
                            "ranges": false,
                            "start": "",
                            "end": ""
                        });
                    }, 0);
                });
            }
            JotForm.onTranslationsFetch(function() {
                JotForm.setCalendar("30", false, {
                    "days": {
                        "monday": true,
                        "tuesday": true,
                        "wednesday": true,
                        "thursday": true,
                        "friday": true,
                        "saturday": true,
                        "sunday": true
                    },
                    "future": true,
                    "past": true,
                    "custom": false,
                    "ranges": false,
                    "start": "",
                    "end": ""
                });
            });
            JotForm.formatDate({
                date: (new Date()),
                dateField: $("id_" + 30)
            });
            JotForm.displayLocalTime("input_30_hourSelect", "input_30_minuteSelect", "input_30_ampm",
                "input_30_timeInput", false);
            if (window.JotForm && JotForm.accessible) $('input_29').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_32').setAttribute('tabindex', 0);
            /*INIT-END*/
        });

        JotForm.prepareCalculationsOnTheFly([null, {
                "name": "clickTo",
                "qid": "1",
                "text": "Application for University",
                "type": "control_head"
            }, {
                "name": "submit",
                "qid": "2",
                "text": "Apply Now!",
                "type": "control_button"
            }, {
                "name": "clickTo3",
                "qid": "3",
                "text": "Personal Information",
                "type": "control_head"
            }, {
                "name": "fullName4",
                "qid": "4",
                "text": "Full Name",
                "type": "control_fullname"
            }, {
                "name": "birthDate5",
                "qid": "5",
                "text": "Birth Date",
                "type": "control_birthdate"
            }, {
                "name": "email",
                "qid": "6",
                "subLabel": "example@example.com",
                "text": "E-mail",
                "type": "control_email"
            }, {
                "name": "phoneNumber7",
                "qid": "7",
                "text": "Phone Number",
                "type": "control_phone"
            }, {
                "name": "address8",
                "qid": "8",
                "text": "Address",
                "type": "control_address"
            }, {
                "name": "clickTo9",
                "qid": "9",
                "text": "Education Background",
                "type": "control_head"
            }, null, null, null, {
                "name": "schoolName13",
                "qid": "13",
                "text": "School Name",
                "type": "control_textbox"
            }, null, null, null, null, null, {
                "name": "schoolName",
                "qid": "19",
                "text": "School Name",
                "type": "control_textbox"
            }, null, null, null, null, null, null, null, {
                "name": "clickTo27",
                "qid": "27",
                "text": "SAT Information",
                "type": "control_head"
            }, null, {
                "name": "satScore",
                "qid": "29",
                "subLabel": "combined",
                "text": "SAT Score",
                "type": "control_textbox"
            }, {
                "name": "testDate",
                "qid": "30",
                "text": "Test Date",
                "type": "control_datetime"
            }, {
                "name": "clickTo31",
                "qid": "31",
                "text": "Activity Information",
                "type": "control_head"
            }, {
                "name": "briefDescription",
                "qid": "32",
                "text": "Brief description of activity no.1 and your role",
                "type": "control_textarea"
            }, null, null, null, null, null, null, null, null, {
                "name": "schoolAddress41",
                "qid": "41",
                "text": "School Address",
                "type": "control_textarea"
            }, {
                "name": "clickTo42",
                "qid": "42",
                "text": "Secondary",
                "type": "control_head"
            }, {
                "name": "clickTo43",
                "qid": "43",
                "text": "College",
                "type": "control_head"
            }, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,
            null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,
            null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, {
                "name": "schoolAddress93",
                "qid": "93",
                "text": "School Address",
                "type": "control_address"
            }, {
                "name": "dateGraduated",
                "qid": "94",
                "text": "Date Graduated",
                "type": "control_datetime"
            }, {
                "name": "studyField95",
                "qid": "95",
                "text": "Study Field",
                "type": "control_textbox"
            }, {
                "name": "gpa",
                "qid": "96",
                "text": "GPA",
                "type": "control_textbox"
            }, {
                "name": "studyField",
                "qid": "97",
                "text": "Study Field",
                "type": "control_textbox"
            }, {
                "name": "dateGraduated98",
                "qid": "98",
                "text": "Date Graduated",
                "type": "control_datetime"
            }, {
                "name": "gpa99",
                "qid": "99",
                "text": "GPA",
                "type": "control_textbox"
            }, {
                "name": "asset20692x63a177bfeb71e444888526",
                "qid": "100",
                "text": "Asset%2069@2x.63a177bfeb71e4.44888526",
                "type": "control_image"
            }, {
                "name": "input101",
                "qid": "101",
                "text": "\nPersian Gulf University\n3147 Patterson Street, Houston, TX, 77002\n\ninfo@PersianGulfUniversity.com\nwww.PersianGulfUniversity.com\n(123) 1234567\n\n",
                "type": "control_text"
            }
        ]);
        setTimeout(function() {
            JotForm.paymentExtrasOnTheFly([null, {
                    "name": "clickTo",
                    "qid": "1",
                    "text": "Application for University",
                    "type": "control_head"
                }, {
                    "name": "submit",
                    "qid": "2",
                    "text": "Apply Now!",
                    "type": "control_button"
                }, {
                    "name": "clickTo3",
                    "qid": "3",
                    "text": "Personal Information",
                    "type": "control_head"
                }, {
                    "name": "fullName4",
                    "qid": "4",
                    "text": "Full Name",
                    "type": "control_fullname"
                }, {
                    "name": "birthDate5",
                    "qid": "5",
                    "text": "Birth Date",
                    "type": "control_birthdate"
                }, {
                    "name": "email",
                    "qid": "6",
                    "subLabel": "example@example.com",
                    "text": "E-mail",
                    "type": "control_email"
                }, {
                    "name": "phoneNumber7",
                    "qid": "7",
                    "text": "Phone Number",
                    "type": "control_phone"
                }, {
                    "name": "address8",
                    "qid": "8",
                    "text": "Address",
                    "type": "control_address"
                }, {
                    "name": "clickTo9",
                    "qid": "9",
                    "text": "Education Background",
                    "type": "control_head"
                }, null, null, null, {
                    "name": "schoolName13",
                    "qid": "13",
                    "text": "School Name",
                    "type": "control_textbox"
                }, null, null, null, null, null, {
                    "name": "schoolName",
                    "qid": "19",
                    "text": "School Name",
                    "type": "control_textbox"
                }, null, null, null, null, null, null, null, {
                    "name": "clickTo27",
                    "qid": "27",
                    "text": "SAT Information",
                    "type": "control_head"
                }, null, {
                    "name": "satScore",
                    "qid": "29",
                    "subLabel": "combined",
                    "text": "SAT Score",
                    "type": "control_textbox"
                }, {
                    "name": "testDate",
                    "qid": "30",
                    "text": "Test Date",
                    "type": "control_datetime"
                }, {
                    "name": "clickTo31",
                    "qid": "31",
                    "text": "Activity Information",
                    "type": "control_head"
                }, {
                    "name": "briefDescription",
                    "qid": "32",
                    "text": "Brief description of activity no.1 and your role",
                    "type": "control_textarea"
                }, null, null, null, null, null, null, null, null, {
                    "name": "schoolAddress41",
                    "qid": "41",
                    "text": "School Address",
                    "type": "control_textarea"
                }, {
                    "name": "clickTo42",
                    "qid": "42",
                    "text": "Secondary",
                    "type": "control_head"
                }, {
                    "name": "clickTo43",
                    "qid": "43",
                    "text": "College",
                    "type": "control_head"
                }, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,
                null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,
                null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,
                null, null, null, null, {
                    "name": "schoolAddress93",
                    "qid": "93",
                    "text": "School Address",
                    "type": "control_address"
                }, {
                    "name": "dateGraduated",
                    "qid": "94",
                    "text": "Date Graduated",
                    "type": "control_datetime"
                }, {
                    "name": "studyField95",
                    "qid": "95",
                    "text": "Study Field",
                    "type": "control_textbox"
                }, {
                    "name": "gpa",
                    "qid": "96",
                    "text": "GPA",
                    "type": "control_textbox"
                }, {
                    "name": "studyField",
                    "qid": "97",
                    "text": "Study Field",
                    "type": "control_textbox"
                }, {
                    "name": "dateGraduated98",
                    "qid": "98",
                    "text": "Date Graduated",
                    "type": "control_datetime"
                }, {
                    "name": "gpa99",
                    "qid": "99",
                    "text": "GPA",
                    "type": "control_textbox"
                }, {
                    "name": "asset20692x63a177bfeb71e444888526",
                    "qid": "100",
                    "text": "Asset%2069@2x.63a177bfeb71e4.44888526",
                    "type": "control_image"
                }, {
                    "name": "input101",
                    "qid": "101",
                    "text": "\nPersian Gulf University\n3147 Patterson Street, Houston, TX, 77002\n\ninfo@PersianGulfUniversity.com\nwww.PersianGulfUniversity.com\n(123) 1234567\n\n",
                    "type": "control_text"
                }
            ]);
        }, 20);
    </script>

@endsection
@section('content')
    <div class="form-all">
        <ul class="form-section page-section">
            <li class="form-line form-line-column form-col-1" data-type="control_image" id="id_100">
                <div id="cid_100" class="form-input-wide" data-layout="full"> <img alt="Image" loading="lazy"
                        class="form-image" style="border:0" src="./image/logo.png" tabindex="0" height="0px"
                        width="100px" data-component="image"> </div>
            </li>
            <li class="form-line form-line-column form-col-2" data-type="control_text" id="id_101">
                <div id="cid_101" class="form-input-wide" data-layout="full">
                    <div id="text_101" class="form-html" data-component="text" tabindex="0">
                        <div style="line-height:18px;text-align:right;padding-top:24px;">
                            <div style="font-size:12pt;"><strong>Persian Gulf University</strong></div>
                            <div style="font-size:10pt;">3147 Patterson Street, Houston, TX, 77002</div>
                            <div style="line-height:14px;">
                                <div style="font-size:8pt;">info@PersianGulfUniversity.com</div>
                                <div style="font-size:8pt;">www.PersianGulfUniversity.com</div>
                                <div style="font-size:8pt;">(123) 1234567</div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li id="cid_1" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-large">
                    <div class="header-text httal htvam">
                        <h1 id="header_1" class="form-header" data-component="header">Application for University</h1>
                        <div id="subHeader_1" class="form-subHeader">Please fill out the application form carefully</div>
                    </div>
                </div>
            </li>
            <li id="cid_3" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-small">
                    <div class="header-text httal htvam">
                        <h3 id="header_3" class="form-header" data-component="header">Personal Information</h3>
                    </div>
                </div>
            </li>
            <li class="form-line" data-type="control_fullname" id="id_4"><label
                    class="form-label form-label-top form-label-auto" id="label_4" for="first_4"> Full Name </label>
                <div id="cid_4" class="form-input-wide" data-layout="full">
                    <div data-wrapper-react="true"><span class="form-sub-label-container" style="vertical-align:top"
                            data-input-type="first"><input type="text" id="first_4" name="q4_fullName4[first]"
                                class="form-textbox" data-defaultvalue="" autocomplete="section-input_4 given-name"
                                size="10" value="" data-component="first"
                                aria-labelledby="label_4 sublabel_4_first"><label class="form-sub-label" for="first_4"
                                id="sublabel_4_first" style="min-height:13px" aria-hidden="false">First
                                Name</label></span><span class="form-sub-label-container" style="vertical-align:top"
                            data-input-type="last"><input type="text" id="last_4" name="q4_fullName4[last]"
                                class="form-textbox" data-defaultvalue="" autocomplete="section-input_4 family-name"
                                size="15" value="" data-component="last"
                                aria-labelledby="label_4 sublabel_4_last"><label class="form-sub-label" for="last_4"
                                id="sublabel_4_last" style="min-height:13px" aria-hidden="false">Last Name</label></span>
                    </div>
                </div>
            </li>
            <li class="form-line" data-type="control_birthdate" id="id_5"><label
                    class="form-label form-label-top form-label-auto" id="label_5" for="input_5"> Birth Date </label>
                <div id="cid_5" class="form-input-wide" data-layout="full">
                    <div data-wrapper-react="true"><span class="form-sub-label-container"
                            style="vertical-align:top"><select name="q5_birthDate5[month]" id="input_5_month"
                                class="form-dropdown" data-component="birthdate-month"
                                aria-labelledby="label_5 sublabel_5_month">
                                <option></option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select><label class="form-sub-label" for="input_5_month" id="sublabel_5_month"
                                style="min-height:13px" aria-hidden="false">Month</label></span><span
                            class="form-sub-label-container" style="vertical-align:top"><select name="q5_birthDate5[day]"
                                id="input_5_day" class="form-dropdown" data-component="birthdate-day"
                                aria-labelledby="label_5 sublabel_5_day">
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select><label class="form-sub-label" for="input_5_day" id="sublabel_5_day"
                                style="min-height:13px" aria-hidden="false">Day</label></span><span
                            class="form-sub-label-container" style="vertical-align:top"><select
                                name="q5_birthDate5[year]" id="input_5_year" class="form-dropdown"
                                data-component="birthdate-year" aria-labelledby="label_5 sublabel_5_year">
                                <option></option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                            </select><label class="form-sub-label" for="input_5_year" id="sublabel_5_year"
                                style="min-height:13px" aria-hidden="false">Year</label></span></div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-1" data-type="control_email" id="id_6"><label
                    class="form-label form-label-top form-label-auto" id="label_6" for="input_6"> E-mail </label>
                <div id="cid_6" class="form-input-wide" data-layout="half"> <span class="form-sub-label-container"
                        style="vertical-align:top"><input type="text" id="input_6" name="q6_email"
                            class="form-textbox validate[Email]" data-defaultvalue="" style="width:310px" size="310"
                            value="" placeholder="ex: myname@example.com" data-component="email"
                            aria-labelledby="label_6 sublabel_input_6"><label class="form-sub-label" for="input_6"
                            id="sublabel_input_6" style="min-height:13px"
                            aria-hidden="false">example@example.com</label></span> </div>
            </li>
            <li class="form-line form-line-column form-col-2" data-type="control_phone" id="id_7"><label
                    class="form-label form-label-top form-label-auto" id="label_7" for="input_7_full"> Phone Number
                </label>
                <div id="cid_7" class="form-input-wide" data-layout="half"> <span class="form-sub-label-container"
                        style="vertical-align:top"><input type="tel" id="input_7_full" name="q7_phoneNumber7[full]"
                            data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]"
                            data-defaultvalue="" autocomplete="section-input_7 tel-national" style="width:310px"
                            data-masked="true" value="" placeholder="(000) 000-0000" data-component="phone"
                            aria-labelledby="label_7" inputmode="text" maskvalue="(###) ###-####"><label
                            class="form-sub-label is-empty" for="input_7_full" id="sublabel_7_masked"
                            style="min-height:13px" aria-hidden="false"></label></span> </div>
            </li>
            <li class="form-line" data-type="control_address" id="id_8"><label
                    class="form-label form-label-top form-label-auto" id="label_8" for="input_8_addr_line1"> Address
                </label>
                <div id="cid_8" class="form-input-wide" data-layout="full">
                    <div summary="" class="form-address-table jsTest-addressField">
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-street-line jsTest-address-lineField"><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_8_addr_line1" name="q8_address8[addr_line1]"
                                        class="form-textbox form-address-line" data-defaultvalue=""
                                        autocomplete="section-input_8 address-line1" value=""
                                        data-component="address_line_1" aria-labelledby="label_8 sublabel_8_addr_line1"
                                        required=""><label class="form-sub-label" for="input_8_addr_line1"
                                        id="sublabel_8_addr_line1" style="min-height:13px" aria-hidden="false">Street
                                        Address</label></span></span></div>
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-street-line jsTest-address-lineField"><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_8_addr_line2" name="q8_address8[addr_line2]"
                                        class="form-textbox form-address-line" data-defaultvalue=""
                                        autocomplete="section-input_8 address-line2" value=""
                                        data-component="address_line_2"
                                        aria-labelledby="label_8 sublabel_8_addr_line2"><label class="form-sub-label"
                                        for="input_8_addr_line2" id="sublabel_8_addr_line2" style="min-height:13px"
                                        aria-hidden="false">Street Address Line 2</label></span></span></div>
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-city-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_8_city" name="q8_address8[city]" class="form-textbox form-address-city"
                                        data-defaultvalue="" autocomplete="section-input_8 address-level2" value=""
                                        data-component="city" aria-labelledby="label_8 sublabel_8_city"
                                        required=""><label class="form-sub-label" for="input_8_city"
                                        id="sublabel_8_city" style="min-height:13px"
                                        aria-hidden="false">City</label></span></span><span
                                class="form-address-line form-address-state-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_8_state" name="q8_address8[state]"
                                        class="form-textbox form-address-state" data-defaultvalue=""
                                        autocomplete="section-input_8 address-level1" value=""
                                        data-component="state" aria-labelledby="label_8 sublabel_8_state"
                                        required=""><label class="form-sub-label" for="input_8_state"
                                        id="sublabel_8_state" style="min-height:13px" aria-hidden="false">State /
                                        Province</label></span></span></div>
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-zip-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_8_postal" name="q8_address8[postal]"
                                        class="form-textbox form-address-postal" data-defaultvalue=""
                                        autocomplete="section-input_8 postal-code" value="" data-component="zip"
                                        aria-labelledby="label_8 sublabel_8_postal" required=""><label
                                        class="form-sub-label" for="input_8_postal" id="sublabel_8_postal"
                                        style="min-height:13px" aria-hidden="false">Postal / Zip
                                        Code</label></span></span><span
                                class="form-address-line form-address-country-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><select
                                        class="form-dropdown form-address-country" name="q8_address8[country]"
                                        id="input_8_country" data-component="country" required=""
                                        aria-labelledby="label_8 sublabel_8_country"
                                        autocomplete="section-input_8 country">
                                        <option value="">Please Select</option>
                                        <option value="United States">United States</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="The Bahamas">The Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaçao">Curaçao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Democratic Republic of the Congo">Democratic Republic of the Congo
                                        </option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="The Gambia">The Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Kosovo">Kosovo</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern
                                            Cyprus</option>
                                        <option value="Northern Mariana">Northern Mariana</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn Islands">Pitcairn Islands</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of the Congo">Republic of the Congo</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Martin">Saint Martin</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
                                        </option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="Somaliland">Somaliland</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Ossetia">South Ossetia</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard</option>
                                        <option value="eSwatini">eSwatini</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Transnistria Pridnestrovie">Transnistria Pridnestrovie</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tristan da Cunha">Tristan da Cunha</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City">Vatican City</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="British Virgin Islands">British Virgin Islands</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="US Virgin Islands">US Virgin Islands</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                        <option value="other">Other</option>
                                    </select><label class="form-sub-label" for="input_8_country" id="sublabel_8_country"
                                        style="min-height:13px" aria-hidden="false">Country</label></span></span></div>
                    </div>
                </div>
            </li>
            <li id="cid_9" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-large">
                    <div class="header-text httal htvam">
                        <h1 id="header_9" class="form-header" data-component="header">Education Background</h1>
                        <div id="subHeader_9" class="form-subHeader">List your previous schools, beginning with the most
                            recent</div>
                    </div>
                </div>
            </li>
            <li id="cid_43" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-small">
                    <div class="header-text httal htvam">
                        <h3 id="header_43" class="form-header" data-component="header">College</h3>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-1" data-type="control_textbox" id="id_13"><label
                    class="form-label form-label-top form-label-auto" id="label_13" for="input_13"> School Name </label>
                <div id="cid_13" class="form-input-wide" data-layout="half"> <input type="text" id="input_13"
                        name="q13_schoolName13" data-type="input-textbox" class="form-textbox" data-defaultvalue=""
                        style="width:310px" size="310" value="" placeholder=" " data-component="textbox"
                        aria-labelledby="label_13"> </div>
            </li>
            <li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_95"><label
                    class="form-label form-label-top form-label-auto" id="label_95" for="input_95"> Study Field </label>
                <div id="cid_95" class="form-input-wide" data-layout="half"> <input type="text" id="input_95"
                        name="q95_studyField95" data-type="input-textbox" class="form-textbox" data-defaultvalue=""
                        style="width:310px" size="310" value="" placeholder=" " data-component="textbox"
                        aria-labelledby="label_95"> </div>
            </li>
            <li class="form-line" data-type="control_address" id="id_93"><label
                    class="form-label form-label-top form-label-auto" id="label_93" for="input_93_addr_line1"> School
                    Address </label>
                <div id="cid_93" class="form-input-wide" data-layout="full">
                    <div summary="" class="form-address-table jsTest-addressField">
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-street-line jsTest-address-lineField"><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_93_addr_line1" name="q93_schoolAddress93[addr_line1]"
                                        class="form-textbox form-address-line" data-defaultvalue=""
                                        autocomplete="section-input_93 address-line1" value=""
                                        data-component="address_line_1" aria-labelledby="label_93 sublabel_93_addr_line1"
                                        required=""><label class="form-sub-label" for="input_93_addr_line1"
                                        id="sublabel_93_addr_line1" style="min-height:13px" aria-hidden="false">Street
                                        Address</label></span></span></div>
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-street-line jsTest-address-lineField"><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_93_addr_line2" name="q93_schoolAddress93[addr_line2]"
                                        class="form-textbox form-address-line" data-defaultvalue=""
                                        autocomplete="section-input_93 address-line2" value=""
                                        data-component="address_line_2"
                                        aria-labelledby="label_93 sublabel_93_addr_line2"><label class="form-sub-label"
                                        for="input_93_addr_line2" id="sublabel_93_addr_line2" style="min-height:13px"
                                        aria-hidden="false">Street Address Line 2</label></span></span></div>
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-city-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_93_city" name="q93_schoolAddress93[city]"
                                        class="form-textbox form-address-city" data-defaultvalue=""
                                        autocomplete="section-input_93 address-level2" value=""
                                        data-component="city" aria-labelledby="label_93 sublabel_93_city"
                                        required=""><label class="form-sub-label" for="input_93_city"
                                        id="sublabel_93_city" style="min-height:13px"
                                        aria-hidden="false">City</label></span></span><span
                                class="form-address-line form-address-state-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_93_state" name="q93_schoolAddress93[state]"
                                        class="form-textbox form-address-state" data-defaultvalue=""
                                        autocomplete="section-input_93 address-level1" value=""
                                        data-component="state" aria-labelledby="label_93 sublabel_93_state"
                                        required=""><label class="form-sub-label" for="input_93_state"
                                        id="sublabel_93_state" style="min-height:13px" aria-hidden="false">State /
                                        Province</label></span></span></div>
                        <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span
                                class="form-address-line form-address-zip-line jsTest-address-lineField "><span
                                    class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                        id="input_93_postal" name="q93_schoolAddress93[postal]"
                                        class="form-textbox form-address-postal" data-defaultvalue=""
                                        autocomplete="section-input_93 postal-code" value="" data-component="zip"
                                        aria-labelledby="label_93 sublabel_93_postal" required=""><label
                                        class="form-sub-label" for="input_93_postal" id="sublabel_93_postal"
                                        style="min-height:13px" aria-hidden="false">Postal / Zip
                                        Code</label></span></span></div>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-1" data-type="control_datetime" id="id_94"><label
                    class="form-label form-label-top form-label-auto" id="label_94" for="lite_mode_94"> Date Graduated
                </label>
                <div id="cid_94" class="form-input-wide" data-layout="half">
                    <div data-wrapper-react="true">
                        <div style="display:none"><span class="form-sub-label-container"
                                style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]"
                                    id="month_94" name="q94_dateGraduated[month]" size="2" data-maxlength="2"
                                    data-age="" maxlength="2" value="" autocomplete="off"
                                    aria-labelledby="label_94 sublabel_94_month" inputmode="numeric"><span
                                    class="date-separate" aria-hidden="true">&nbsp;-</span><label class="form-sub-label"
                                    for="month_94" id="sublabel_94_month" style="min-height:13px"
                                    aria-hidden="false">Month</label></span><span class="form-sub-label-container"
                                style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]"
                                    id="day_94" name="q94_dateGraduated[day]" size="2" data-maxlength="2"
                                    data-age="" maxlength="2" value="" autocomplete="off"
                                    aria-labelledby="label_94 sublabel_94_day" inputmode="numeric"><span
                                    class="date-separate" aria-hidden="true">&nbsp;-</span><label class="form-sub-label"
                                    for="day_94" id="sublabel_94_day" style="min-height:13px"
                                    aria-hidden="false">Day</label></span><span class="form-sub-label-container"
                                style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]"
                                    id="year_94" name="q94_dateGraduated[year]" size="4" data-maxlength="4"
                                    data-age="" maxlength="4" value="" autocomplete="off"
                                    aria-labelledby="label_94 sublabel_94_year"><label class="form-sub-label"
                                    for="year_94" id="sublabel_94_year" style="min-height:13px"
                                    aria-hidden="false">Year</label></span></div><span class="form-sub-label-container"
                            style="vertical-align:top"><input type="text"
                                class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_94"
                                size="12" data-maxlength="12" data-age="" value="" data-format="mmddyyyy"
                                data-seperator="-" placeholder="MM-DD-YYYY" autocomplete="off"
                                aria-labelledby="label_94 sublabel_94_litemode" inputmode="numeric"><img
                                class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_94_pick"
                                src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime"
                                aria-hidden="true" data-allow-time="No" data-version="v2"><label class="form-sub-label"
                                for="lite_mode_94" id="sublabel_94_litemode" style="min-height:13px"
                                aria-hidden="false">Date</label></span>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_96"><label
                    class="form-label form-label-top form-label-auto" id="label_96" for="input_96"> GPA </label>
                <div id="cid_96" class="form-input-wide" data-layout="half"> <input type="text" id="input_96"
                        name="q96_gpa" data-type="input-textbox" class="form-textbox" data-defaultvalue=""
                        style="width:310px" size="310" value="" data-component="textbox"
                        aria-labelledby="label_96"> </div>
            </li>
            <li id="cid_42" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-small">
                    <div class="header-text httal htvam">
                        <h3 id="header_42" class="form-header" data-component="header">Secondary</h3>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-3" data-type="control_textbox" id="id_19"><label
                    class="form-label form-label-top form-label-auto" id="label_19" for="input_19"> School Name
                </label>
                <div id="cid_19" class="form-input-wide" data-layout="half"> <input type="text"
                        id="input_19" name="q19_schoolName" data-type="input-textbox" class="form-textbox"
                        data-defaultvalue="" style="width:310px" size="310" value="" placeholder=" "
                        data-component="textbox" aria-labelledby="label_19"> </div>
            </li>
            <li class="form-line form-line-column form-col-4" data-type="control_textbox" id="id_97"><label
                    class="form-label form-label-top form-label-auto" id="label_97" for="input_97"> Study Field
                </label>
                <div id="cid_97" class="form-input-wide" data-layout="half"> <input type="text"
                        id="input_97" name="q97_studyField" data-type="input-textbox" class="form-textbox"
                        data-defaultvalue="" style="width:310px" size="310" value="" placeholder=" "
                        data-component="textbox" aria-labelledby="label_97"> </div>
            </li>
            <li class="form-line" data-type="control_textarea" id="id_41"><label
                    class="form-label form-label-top form-label-auto" id="label_41" for="input_41"> School Address
                </label>
                <div id="cid_41" class="form-input-wide" data-layout="full">
                    <textarea id="input_41" class="form-textarea" name="q41_schoolAddress41" style="width:648px;height:163px"
                        data-component="textarea" aria-labelledby="label_41"></textarea>
                </div>
            </li>
            <li class="form-line form-line-column form-col-1" data-type="control_datetime" id="id_98"><label
                    class="form-label form-label-top form-label-auto" id="label_98" for="lite_mode_98"> Date
                    Graduated </label>
                <div id="cid_98" class="form-input-wide" data-layout="half">
                    <div data-wrapper-react="true">
                        <div style="display:none"><span class="form-sub-label-container"
                                style="vertical-align:top"><input type="tel"
                                    class="form-textbox validate[limitDate]" id="month_98"
                                    name="q98_dateGraduated98[month]" size="2" data-maxlength="2"
                                    data-age="" maxlength="2" value="" autocomplete="off"
                                    aria-labelledby="label_98 sublabel_98_month" inputmode="numeric"><span
                                    class="date-separate" aria-hidden="true">&nbsp;-</span><label
                                    class="form-sub-label" for="month_98" id="sublabel_98_month"
                                    style="min-height:13px" aria-hidden="false">Month</label></span><span
                                class="form-sub-label-container" style="vertical-align:top"><input type="tel"
                                    class="form-textbox validate[limitDate]" id="day_98"
                                    name="q98_dateGraduated98[day]" size="2" data-maxlength="2" data-age=""
                                    maxlength="2" value="" autocomplete="off"
                                    aria-labelledby="label_98 sublabel_98_day" inputmode="numeric"><span
                                    class="date-separate" aria-hidden="true">&nbsp;-</span><label
                                    class="form-sub-label" for="day_98" id="sublabel_98_day"
                                    style="min-height:13px" aria-hidden="false">Day</label></span><span
                                class="form-sub-label-container" style="vertical-align:top"><input type="tel"
                                    class="form-textbox validate[limitDate]" id="year_98"
                                    name="q98_dateGraduated98[year]" size="4" data-maxlength="4"
                                    data-age="" maxlength="4" value="" autocomplete="off"
                                    aria-labelledby="label_98 sublabel_98_year"><label class="form-sub-label"
                                    for="year_98" id="sublabel_98_year" style="min-height:13px"
                                    aria-hidden="false">Year</label></span></div><span class="form-sub-label-container"
                            style="vertical-align:top"><input type="text"
                                class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_98"
                                size="12" data-maxlength="12" data-age="" value=""
                                data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY"
                                autocomplete="off" aria-labelledby="label_98 sublabel_98_litemode"
                                inputmode="numeric"><img class=" newDefaultTheme-dateIcon icon-liteMode"
                                alt="Pick a Date" id="input_98_pick" src="https://cdn.jotfor.ms/images/calendar.png"
                                data-component="datetime" aria-hidden="true" data-allow-time="No"
                                data-version="v2"><label class="form-sub-label" for="lite_mode_98"
                                id="sublabel_98_litemode" style="min-height:13px"
                                aria-hidden="false">Date</label></span>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_99"><label
                    class="form-label form-label-top form-label-auto" id="label_99" for="input_99"> GPA </label>
                <div id="cid_99" class="form-input-wide" data-layout="half"> <input type="text"
                        id="input_99" name="q99_gpa99" data-type="input-textbox" class="form-textbox"
                        data-defaultvalue="" style="width:310px" size="310" value=""
                        data-component="textbox" aria-labelledby="label_99"> </div>
            </li>
            <li id="cid_27" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-small">
                    <div class="header-text httal htvam">
                        <h3 id="header_27" class="form-header" data-component="header">SAT Information</h3>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-3" data-type="control_datetime" id="id_30"><label
                    class="form-label form-label-top form-label-auto" id="label_30" for="lite_mode_30"> Test Date
                </label>
                <div id="cid_30" class="form-input-wide" data-layout="half">
                    <div data-wrapper-react="true">
                        <div style="display:none"><span class="form-sub-label-container"
                                style="vertical-align:top"><input type="tel"
                                    class="form-textbox validate[limitDate]" id="month_30" name="q30_testDate[month]"
                                    size="2" data-maxlength="2" data-age="" maxlength="2" value="03"
                                    autocomplete="off" aria-labelledby="label_30 sublabel_30_month"
                                    inputmode="numeric"><span class="date-separate"
                                    aria-hidden="true">&nbsp;-</span><label class="form-sub-label" for="month_30"
                                    id="sublabel_30_month" style="min-height:13px"
                                    aria-hidden="false">Month</label></span><span class="form-sub-label-container"
                                style="vertical-align:top"><input type="tel"
                                    class="currentDate form-textbox validate[limitDate]" id="day_30"
                                    name="q30_testDate[day]" size="2" data-maxlength="2" data-age=""
                                    maxlength="2" value="07" autocomplete="off"
                                    aria-labelledby="label_30 sublabel_30_day" inputmode="numeric"><span
                                    class="date-separate" aria-hidden="true">&nbsp;-</span><label
                                    class="form-sub-label" for="day_30" id="sublabel_30_day"
                                    style="min-height:13px" aria-hidden="false">Day</label></span><span
                                class="form-sub-label-container" style="vertical-align:top"><input type="tel"
                                    class="form-textbox validate[limitDate]" id="year_30" name="q30_testDate[year]"
                                    size="4" data-maxlength="4" data-age="" maxlength="4" value="2023"
                                    autocomplete="off" aria-labelledby="label_30 sublabel_30_year"><label
                                    class="form-sub-label" for="year_30" id="sublabel_30_year"
                                    style="min-height:13px" aria-hidden="false">Year</label></span></div><span
                            class="form-sub-label-container" style="vertical-align:top"><input type="text"
                                class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_30"
                                size="12" data-maxlength="12" data-age="" value="03-07-2023"
                                data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY"
                                autocomplete="off" aria-labelledby="label_30 sublabel_30_litemode"
                                inputmode="numeric"><img class="showAutoCalendar newDefaultTheme-dateIcon icon-liteMode"
                                alt="Pick a Date" id="input_30_pick" src="https://cdn.jotfor.ms/images/calendar.png"
                                data-component="datetime" aria-hidden="true" data-allow-time="No"
                                data-version="v2"><label class="form-sub-label" for="lite_mode_30"
                                id="sublabel_30_litemode" style="min-height:13px"
                                aria-hidden="false">Date</label></span>
                    </div>
                </div>
            </li>
            <li class="form-line form-line-column form-col-4" data-type="control_textbox" id="id_29"><label
                    class="form-label form-label-top form-label-auto" id="label_29" for="input_29"> SAT Score
                </label>
                <div id="cid_29" class="form-input-wide" data-layout="half"> <span
                        class="form-sub-label-container" style="vertical-align:top"><input type="text"
                            id="input_29" name="q29_satScore" data-type="input-textbox" class="form-textbox"
                            data-defaultvalue="" style="width:310px" size="310" value="" placeholder=" "
                            data-component="textbox" aria-labelledby="label_29 sublabel_input_29"><label
                            class="form-sub-label" for="input_29" id="sublabel_input_29" style="min-height:13px"
                            aria-hidden="false">combined</label></span> </div>
            </li>
            <li id="cid_31" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-small">
                    <div class="header-text httal htvam">
                        <h3 id="header_31" class="form-header" data-component="header">Activity Information</h3>
                    </div>
                </div>
            </li>
            <li class="form-line" data-type="control_textarea" id="id_32"><label
                    class="form-label form-label-top form-label-auto" id="label_32" for="input_32"> Brief description
                    of activity no.1 and your role </label>
                <div id="cid_32" class="form-input-wide" data-layout="full">
                    <textarea id="input_32" class="form-textarea" name="q32_briefDescription" style="width:648px;height:163px"
                        data-component="textarea" aria-labelledby="label_32"></textarea>
                </div>
            </li>
            <li class="form-line" data-type="control_button" id="id_2">
                <div id="cid_2" class="form-input-wide" data-layout="full">
                    <div data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                        <button id="input_2" type="submit"
                            class="form-submit-button submit-button jf-form-buttons jsTest-submitField"
                            data-component="button" data-content="">Apply Now!</button></div>
                </div>
            </li>
            <li style="display:none">Should be Empty: <input type="text" name="website" value=""></li>
        </ul>
    </div>
@endsection
