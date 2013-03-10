<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

	<h2>HOME</h2>
	<ul>
		<li><a href="home.php">Home</a>
		</li>
	</ul>
	<div class="controllers_container">
		<form name="controllers_form" action="../controller/consult.php"
			method="post">
			<dl>
				<dt>(Cp) Chest pain type</dt>
				<dd>
					<select name="cp_sel">
						<option>typ_angina</option>
						<option>asympt</option>
						<option>non_anginal</option>
						<option>atyp_angina</option>
					</select>
				</dd>
				<dt>(Restecg) Resting electrocardiographic results</dt>
				<dd>
					<select name="restecg_sel">
						<option>left_vent_hyper</option>
						<option>normal</option>
						<option>st_t_wave_abnormality</option>
					</select>
				</dd>
				<dt>(Slope) The Slope of the peak exercise ST segment</dt>
				<dd>
					<select name="slope_sel">
						<option>up</option>
						<option>flat</option>
						<option>down</option>
					</select>
				</dd>
				<dt>(Thal)</dt>
				<dd>
					<select name="thal_sel">
						<option>fixed_defect</option>
						<option>normal</option>
						<option>reversable_defect</option>
					</select>
				</dd>
				<dt>(Num) Diagnosis of heart disease</dt>
				<dd>
					<select name="num_sel">
						<option>&lt;50</option>
						<option>&gt;50_1</option>
						<option>&gt;50_2</option>
						<option>&gt;50_3</option>
						<option>&gt;50_4</option>
					</select>
				</dd>
				<dt>(Age)</dt>
				<dd>
					<input name="age_inp" type="checkbox" />age in years
				</dd>
				<dt>(Trestbpd)</dt>
				<dd>
					<input name="tres_inp" type="checkbox" />Resting blood pressure
				</dd>
				<dt>(Chol)</dt>
				<dd>
					<input name="chol_inp" type="checkbox" />Serum cholestoral in mg/dl
				</dd>
				<dt>(Fbs)</dt>
				<dd>
					<input name="fbs_inp" type="checkbox" />Fasting blood sugar
				</dd>
				<dt>(Exang)</dt>
				<dd>
					<input name="exan_inp" type="checkbox" />Exercise induced angina
				</dd>
				<dt>(Thalach)</dt>
				<dd>
					<input name="thal_inp" type="checkbox" />Maximum heart rate
					achieved
				</dd>
				<dt>(Oldpeak)</dt>
				<dd>
					<input name="old_inp" type="checkbox" />ST depression induced by
					exercise relative to rest
				</dd>
				<dt>(Ca)</dt>
				<dd>
					<input name="ca_inp" type="checkbox" />Number of major vessels
					colored by flourosopy
				</dd>
				<dt>
					<input name="send_inp" type="submit" value="Consult" />
				</dt>
			</dl>
		</form>
	</div>

	<form name="logout" action="../index.php">
		<input name="logout_inp" type="submit" value="logout" />
	</form>
</body>
</html>
