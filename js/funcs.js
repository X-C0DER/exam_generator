var multi_choice = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<div class="form-textarea">
				<textarea name="question[$]" class="std-input" maxlength="500" required></textarea>
				<label>Question*</label>
			</div>
			<div class="multi">
				<lable>A)</lable>
				<input type="text" class="std-input choicei" name="choice_a[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="1" required> <br>
				<lable>B)</lable>
				<input type="text" class="std-input choicei" name="choice_b[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="2"> <br>
				<lable>C)</lable>
				<input type="text" class="std-input choicei" name="choice_c[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="3"> <br>
				<lable>D)</lable>
				<input type="text" class="std-input choicei" name="choice_d[$]"  autocomplete="off" required> <input type="radio" name="answer[$]" value="4"> <br>
			</div>
		</div>
		`;
var true_false = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<div class="form-textarea">
				<textarea name="question[$]" class="std-input" maxlength="500" required></textarea>
				<label>Question*</label>
			</div>
			<div class="true">
				<label>True</label><input type="radio" name="answer[$]" value="1" required>
				<label>False</label><input type="radio" name="answer[$]" value="2">
			</div>
		</div>
		`;
var short_answer = `
		<div class="question">
			<div class="question-no">#@</div><br>
			<div class="form-textarea">
				<textarea name="question[$]" class="std-input" maxlength="500" required></textarea>
				<label>Question*</label>
			</div>
			<input type="hidden" name="answer[$]" value="">
		</div>
		`;

const types = ["", true_false, multi_choice, short_answer];

var questions = document.getElementById("questions");
var questions_class = document.getElementsByClassName("question");

function changed_type(i){
	if(!questions_class.length)
		questions.innerHTML += types[i].replace(/\$/g, 0).replace("@", 1);
	else{
		var str_types = "", length_c = questions_class.length;
		while(questions_class[0]){
			var len = length_c - questions_class.length;
			str_types += types[i].replace(/\$/g, len).replace("@", len+1);
			questions_class[0].parentNode.removeChild(questions_class[0]);
		}
		questions.innerHTML += str_types;
	}
}

function add_question(){
	var indx = document.getElementById('types').selectedIndex;
	if(indx)
		questions.insertAdjacentHTML(
			"beforeend",
			types[indx].replace(/\$/g, questions_class.length).
						replace("@", questions_class.length+1)
		);
}

add_question();

function remove_question(){
	if(questions_class.length)
		questions_class[questions_class.length-1].remove();
}


function remove_after(){
	document.getElementById("temp-msg").remove();
}

setTimeout(remove_after, 1000 * 4);