@extends('users.layouts.layout')

@section('title', 'Memory Palace | Quiz')

@section('main-content')

    <style>
        ul {
            list-style: none;
        }

        .select {
            position: relative;
            width: 100%;
            max-width: 120px;
        }

        .select-field {
            padding: 10px 10px 10px 10px;
            width: 100%;
            font-family: 'SF UI Text', sans-serif;
            font-size: 10px;
            color: #ffffff;
            background-color: #2F76E1;
            border: 2px solid #2F76E1;
            border-radius: 4px;
            transition: 0.2s;
            z-index: 1;
            cursor: pointer;
        }

        .select-field:focus {
            outline: transparent;
            box-shadow: 0 0 3px #7e9bbd;
        }

        .select-field::placeholder {
            color: #ffffff;
        }

        .select-field+span {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -5px;
            right: 14px;
            bottom: 0;
            width: 10px;
        }

        .select-field+span::after {
            content: "";
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 7px 7px 0 7px;
            border-color: #ffffff transparent transparent transparent;
            pointer-events: none;
            transition: 0.5s;
            z-index: 1;
        }

        .select-field.turn+span::after {
            border-width: 0 7px 7px 7px;
            border-color: transparent transparent #ffffff transparent;
        }

        .select-list {
            display: none;
            position: absolute;
            top: 45px;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 2px solid #7e9bbd;
            animation: fadeIn 0.4s;
            z-index: 10;
        }

        .select-list.open {
            display: block;
        }

        .select-list li {
            display: block;
            color: var(--textColor);
            font-weight: var(--textWeightLight);
            padding: 12px 12px 12px 12px;
            transition: all 0.2s ease-out;
            cursor: pointer;
        }

        .select-list li:not(:last-child) {
            border-bottom: 1px solid #2F76E1;
        }

        .select-list li:hover {
            background-color: #2F76E1;
            color: #fff;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .quiz1 {
            display: flex;
            margin: 10px 0px 10px 20px;
            justify-content: space-between;
        }

        .quiz2 {
            margin: 15px;
        }

        .quiz2 h2 {
            font-size: 18px;
            font-weight: 600;
            font-family: 'SF UI Text', sans-serif;
            color: #000000;
            line-height: 3;
        }

        .quiz3 {
            margin-top: 50px;
        }

        .quiz4 {
            margin-top: 50px;
        }

        .quiz4 button {
            background-color: #2F76E1;
            color: #ffffff;
            padding: 12px 29px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #2F76E1;
            border-radius: 10px;
            font-family: 'SF UI Text', sans-serif;
            float: right;
        }
    </style>

    <section class="dash1">
        <div class="container-fluid p-0">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    @include('users.includes.list')
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                    <div class="dash18">
                        <div class="dash19">
                            <h2>DAILY QUIZZES</h2>
                            <div class="dash20">
                                <ul class="select">
                                    <li>
                                        <input class="select-field" value="" placeholder="ROOM 1" readonly />
                                        <span></span>
                                        <ul class="select-list">
                                            <li>Item I</li>
                                            <li>Item II</li>
                                            <li>Item III</li>
                                        </ul>
                                    </li>
                                </ul>

                                <ul class="select">
                                    <li>
                                        <input class="select-field" value="" placeholder="COURSE 1" readonly />
                                        <span></span>
                                        <ul class="select-list">
                                            <li>Item I</li>
                                            <li>Item II</li>
                                            <li>Item III</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @foreach ($DailyQuiz as $DailyQuizs)
                            <div class="dash21 quiz3">
                                <div class="quiz2">
                                    <h2>{{ $DailyQuizs->question }}</h2>
                                </div>
                                <div class="quiz1">
                                    @php
                                        // Split the string into an array using ","
                                        $wordsArray = explode(',', $DailyQuizs->options);
                                        $i = 0;
                                    @endphp
                                    @foreach ($wordsArray as $word)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="quiz_{{ $DailyQuizs->id }}"
                                                value="{{ $word }}" data-ans="{{ $DailyQuizs->correct_answer }}"
                                                onclick="handleRadioClick(this)">
                                            <label class="form-check-label">
                                                {{ $word }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach

                        <div class="quiz4">
                            <button type="submit">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        class SelectManager {
            constructor(containerSelector, selectSelector) {
                this.container = document.querySelector(containerSelector);
                this.selectSelector = selectSelector;
                this.init();
            }

            init() {
                this.container.addEventListener("click", (e) => {
                    const targetSelect = e.target.closest(this.selectSelector);
                    if (targetSelect) {
                        this.handleSelectClick(targetSelect);
                    } else {
                        this.closeAllSelects();
                    }
                });

                document.addEventListener("click", (e) => {
                    if (
                        !e.target.closest(this.selectSelector) &&
                        !e.target.closest(".select-list")
                    ) {
                        this.closeAllSelects();
                    }
                });
            }

            handleSelectClick(select) {
                const field = select.querySelector(".select-field");
                const list = select.querySelector(".select-list");

                this.closeOtherSelects(field);

                list.classList.toggle("open");
                field.classList.toggle("turn");

                list.addEventListener("click", (e) => {
                    e.stopPropagation();
                });

                const selectItemClickHandler = (e) => {
                    const selectedItem = e.target.closest("li");
                    if (selectedItem) {
                        const result = selectedItem.textContent.trim();
                        field.value = result;
                        list.classList.remove("open");
                        field.classList.remove("turn");
                        list.removeEventListener("click", selectItemClickHandler);
                    }
                };

                list.addEventListener("click", selectItemClickHandler);
            }

            closeOtherSelects(clickedField) {
                var selects = this.container.querySelectorAll(this.selectSelector);
                for (var i = 0; i < selects.length; i++) {
                    var select = selects[i];
                    var field = select.querySelector(".select-field");
                    var list = select.querySelector(".select-list");

                    if (field && list && field !== clickedField) {
                        if (list.classList.contains("open")) {
                            list.classList.remove("open");
                        }
                        if (field.classList.contains("turn")) {
                            field.classList.remove("turn");
                        }
                    }
                }
            }

            closeAllSelects() {
                let selects = this.container.querySelectorAll(this.selectSelector);
                for (let i = 0; i < selects.length; i++) {
                    let select = selects[i];
                    const field = select.querySelector(".select-field");
                    const list = select.querySelector(".select-list");

                    if (list && field) {
                        list.classList.remove("open");
                        field.classList.remove("turn");
                    }
                }
            }
        }

        // Init
        const selectManager = new SelectManager("body", ".select");
    </script>

    {{-- input script --}}
    {{-- <script>
        var correctCount = 0; // Initialize the counter
        var totalMarks = 0; // Initialize the total marks
        function handleRadioClick(radio) {
            var selectedValue = radio.value;
            var dataValue = radio.getAttribute("data-val");
            var correctAnswer = radio.getAttribute("data-ans");

            // Now you can use the selectedValue, dataValue, and correctAnswer variables as needed
            console.log("Selected Value: " + selectedValue);
            console.log("Data Value: " + dataValue);
            console.log("Correct Answer: " + correctAnswer);

            // Add your logic here based on the selected radio button
            // For example, you can compare the selected value with the correct answer
            // alert('selectedValue' + selectedValue, );
            if (selectedValue == correctAnswer) {
                console.log("Correct!");
                $(radio).closest('.form-check').css("color", "green");
                // Increment the correct count
                correctCount++;

                // Update total marks (you can customize the scoring logic)
                totalMarks += 10; // For example, each correct answer adds 1 mark

                // Log correct answer and total marks
                console.log("Correct Answer: " + correctCount + ", Total Marks: " + totalMarks);
                 
            } else {
                console.log("Incorrect!");
                // Add your code for the incorrect answer
            }
            // Update the result count in the console
            console.log("Correct Answers: " + correctCount);

            // Update the marks in the console
            console.log("Marks: " + totalMarks);
        }
    </script> --}}


    <script>
        var correctCount = 0; // Initialize the counter
        var totalMarks = 0; // Initialize the total marks
        var lastSelectedRadio = null; // Store the last selected radio button

        function handleRadioClick(radio) {
            var selectedValue = radio.value;
            var dataValue = radio.getAttribute("data-val");
            var correctAnswer = radio.getAttribute("data-ans");

            // Check if the same radio button is clicked again
            if (lastSelectedRadio === radio) {
                console.log("Already selected, no action taken");
                return;
            }

            // Check if there was a previously selected radio button
            if (lastSelectedRadio !== null) {
                alert(1);
                var lastSelectedValue = lastSelectedRadio.value;
                var lastSelectedCorrectAnswer = lastSelectedRadio.getAttribute("data-ans");

                // Deduct two marks if the previously selected answer was correct
                if (lastSelectedValue === lastSelectedCorrectAnswer) {
                    correctCount--;
                    totalMarks -= 10;
                    console.log("Changed from correct to incorrect, deducted 2 marks");
                }

            }

            // Now you can use the selectedValue, dataValue, and correctAnswer variables as needed
            console.log("Selected Value: " + selectedValue);
            console.log("Data Value: " + dataValue);
            console.log("Correct Answer: " + correctAnswer);

            // Add your logic here based on the selected radio button
            if (selectedValue === correctAnswer) {
                console.log("Correct!");
                $(radio).closest('.form-check').css("color", "green");
                // Increment the correct count
                correctCount++;

                // Update total marks (you can customize the scoring logic)
                totalMarks += 10; // For example, each correct answer adds 10 marks

                // Log correct answer and total marks
                console.log("Correct Answer: " + correctCount + ", Total Marks: " + totalMarks);

            } else {
                console.log("Incorrect!");
                // Add your code for the incorrect answer
            }

            // Update the result count in the console
            console.log("Correct Answers: " + correctCount);

            // Update the marks in the console
            console.log("Marks: " + totalMarks);

            // Store the currently selected radio button for future reference
            lastSelectedRadio = radio;
        }
    </script>



    <div>
        <a id="button" class="my-button show"></a>
    </div>

@endsection
