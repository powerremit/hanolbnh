<?php
$CI =& get_instance();
?>

<script type="text/javascript">
	var _cmn = {};

	_cmn['temp'] = {};


	_cmn['ajax'] = {
		csrf_token_name : '<?php echo $this->security->get_csrf_token_name();?>',
		csrf_token : '<?php echo $this->security->get_csrf_hash(); ;?>',
		error : function(request,status,error) {
			console.group();
			console.log("code\n", request.status);
			console.log("message\n", request.responseText);
			console.log("error\n", error);
			console.groupEnd();
		},
		exec : function(ajaxArgs){
			// ajaxArgs : $.ajax(여기에 들어가는 JSON)
			if(ajaxArgs.url == undefined || ajaxArgs.url == null || ajaxArgs.url == '') {
				console.log('error : _cmn.ajax.exec - ajax url을 정의해주세요.');
				return false;
			}

			$.ajax({
				url : ajaxArgs.url,
				type : (ajaxArgs.type == undefined) ? 'post' : ajaxArgs.type,
				data : (ajaxArgs.data == undefined) ? {} : ajaxArgs.data,
				dataType: (ajaxArgs.dataType == undefined) ? 'json' : ajaxArgs.dataType,
				beforeSend : (ajaxArgs.beforeSend == undefined) ? showLoading : ajaxArgs.beforeSend,
				processData : (ajaxArgs.processData == undefined) ? true : ajaxArgs.processData,
				contentType : (ajaxArgs.contentType == undefined) ? 'application/x-www-form-urlencoded' : ajaxArgs.contentType,
				success : function(res){
					_cmn.ajax.csrf_token = res.token;
					if(ajaxArgs.success != undefined) ajaxArgs.success(res);
				},
				error : (ajaxArgs.error == undefined) ? _cmn.ajax.error : ajaxArgs.error,
				complete : (ajaxArgs.complete == undefined) ? hideLoading : ajaxArgs.complete,
			});
		},
	}

	_cmn['console'] = {
		formData : function(fd){
			for (var pair of fd.entries()) {
				console.log(pair[0], pair[1]);
			}
		}
	}

	//_cmn['<?//=_COMMON_MODAL_ID?>//'] = {
	_cmn['cmnModal'] = {
		setTitle : function(title){
			document.querySelector("#<?=_COMMON_MODAL_ID?> > .modal-head > h4").innerText = title;
		},
		setContent : function(contentHTML){
			document.querySelector("#<?=_COMMON_MODAL_ID?> > .modal-body > p").innerHTML = contentHTML;
		},
		open : function(title, content){
			if(title !== undefined) _cmn['<?=_COMMON_MODAL_ID?>'].setTitle(title);
			if(content !== undefined) _cmn['<?=_COMMON_MODAL_ID?>'].setContent(content);
			openModal('<?=_COMMON_MODAL_ID?>');
		}
	}

	_cmn['encrypt'] = {
		getBase64Encoding : function(str){
			return btoa(str).replace(/=/gi,'');
		},
		cryptoJs : function(text){
			const encKey = "<?=CRYPTOJS_KEY?>";
			const iv = CryptoJS.enc.Hex.parse("IvData1zqywxz2345");
			let encryptedText = CryptoJS.AES.encrypt(text, encKey, { iv: iv }).toString();
			return encryptedText;
		}
	}


	_cmn['regex'] = {
		email : /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
		// nick : /^[\w~!@#$%^&*()_+\-=\[\]{}\\|:,.<>/?]{3,40}$/,
		//한글,영어,숫자만
		nick : /^[ㄱ-ㅎ|가-힣|a-z|A-Z|0-9]{3,40}$/,
		password : /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()_+\-=\[\]{}\\|;:,.<>/?])[A-Za-z\d~!@#$%^&*()_+\-=\[\]{}\\|;:,.<>/?]{8,15}$/,
		number : /^[0-9]{1,}(\.[0-9]{0,8})?$/, /*소숫점 8자리*/
		number_sell : /^[0-9]{1,}(\.[0-9]{0,7})?$/, /*소숫점 7자리*/
		int_only : /^[1-9][0-9]*$/, /*only 숫자(정수)*/
	}

	_cmn['copyToClipboard'] = function(selector){
		const textArea = document.createElement('textarea');
		document.body.appendChild(textArea);
		if(document.querySelector(selector).tagName == 'INPUT' || document.querySelector(selector).tagName == 'TEXTAREA'){
			textArea.value = document.querySelector(selector).value;
		}else{
			textArea.value = document.querySelector(selector).textContent;
		}
		textArea.select();
		document.execCommand('copy');
		document.body.removeChild(textArea);
	}

	// _cmn['syncImgTagWithInputFile'] = function handleFileSelect(inputFileObj, targetImgTag, cbFnc) {
	_cmn['syncImgTagWithInputFile'] = function (inputFileObj, targetImgTag, cbFnc) {
		if (inputFileObj.files && inputFileObj.files.length) {
			let reader = new FileReader();
			inputFileObj.enabled = false;
			reader.onload = (function (e) {
				$(targetImgTag).attr("src", e.target.result).attr("title", escape(e.name));
				if(cbFnc !== undefined) cbFnc(inputFileObj, targetImgTag);
			});
			reader.readAsDataURL(inputFileObj.files[0]);
		}
	}

	//_cmn['imgFiles'] = {
	//	// noProfile : "/assets/images/common/Icon_user_list.svg",
	//	noProfile : "<?php //echo $this->config->item('imgFiles')['noProfile']; ?>//",
	//	noImage : "<?php //echo $this->config->item('imgFiles')['noImage']; ?>//",
	//	white : "<?php //echo $this->config->item('imgFiles')['white']; ?>//"
	//}

	_cmn['getUrlParams'] = function () {
		var params = {};
		window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) { params[key] = value; });
		return params;
	};

	_cmn['time'] = {
		getTimestamp : function(param) {
			let _vDate =+ new Date(param); // 전달 받은 일자

			return _vDate;
		},
		setCountdown : function (selector, run_time){ //파라미터 - 셀렉터, 반복시간

			// 사용전 주의사항 : 마감 시간을 _cmn['time'].getTimestamp(마감시간) 함수로 받아와서 선택자 태그의 data-time 속성값안에 넣어줄것
			// ex) $(this)가 <p></p> 태그고 마감시간이 2021-12-22 17:30:30 형태라면 마감시간을 먼저 _cmn['getTimestamp']로 불러와서 timestamp형태로 변형한뒤 <p data-time=''></p> 안에 넣어줄것

			let _second = 1000;
			let _minute = _second * 60;
			let _hour = _minute * 60;
			let _day = _hour * 24;

			function getDate(target_time){
				let _nDate = new Date(); // 현재 일자

				let cal_date = target_time - _nDate;

				let days = Math.floor(cal_date / _day);
				let hours = Math.floor((cal_date % _day) / _hour);
				let minutes = Math.floor((cal_date % _hour) / _minute);
				let seconds = Math.floor((cal_date % _minute) / _second);

				return days+'D : '+hours+'H : '+minutes+'M : '+seconds+'S';
			}

			function countDown(){
				$(selector).each(function(){
					$(this).text(getDate($(this).data('time')));
				})
			}
			setInterval(countDown, run_time);
		},
		getDateStr : function(date){ //파라메타는 new Date()형태로 받아야함
			let year = date.getFullYear();
			let month = ('0' + (date.getMonth() + 1)).slice(-2);
			let day = ('0' + date.getDate()).slice(-2);

			return year + '-' + month  + '-' + day;
		},
		getToday : function(){
			let today = new Date();
			return _cmn.time.getDateStr(today)
		},
		getOneWeekAgo : function(){
			let oneWeekAgo = new Date(new Date().setDate(new Date().getDate() - 7));	// 일주일전
			return _cmn.time.getDateStr(oneWeekAgo)
		},
		getTwoWeekAgo : function(){
			let TwoWeekAgo = new Date(new Date().setDate(new Date().getDate() - 15));	// 15일전
			return _cmn.time.getDateStr(TwoWeekAgo)
		},
		getOneMonthAgo : function(){
			let oneMonthAgo = new Date(new Date().setMonth(new Date().getMonth() - 1));	// 한달전
			return _cmn.time.getDateStr(oneMonthAgo)
		},
		getThreeMonthAgo : function() {
			let oneMonthAgo = new Date(new Date().setMonth(new Date().getMonth() - 3));	// 3달전
			return _cmn.time.getDateStr(oneMonthAgo)
		},
		getOneYearAgo : function(){
			let oneYearAgo = new Date(new Date().setFullYear(new Date().getFullYear() - 1));	// 1년전
			return _cmn.time.getDateStr(oneYearAgo)
		},
		getWhenDateDetail       : function (date, type = '') {
			let str;
			let date_time = new Date(date * 1000)
			let month = date_time.getMonth() + 1;
			let day = date_time.getDate();
			let hour = date_time.getHours();
			let minute = date_time.getMinutes();

			month = month >= 10 ? month : '0' + month;
			day = day >= 10 ? day : '0' + day;
			hour = hour >= 10 ? hour : '0' + hour;
			minute = minute >= 10 ? minute : '0' + minute;

			if (type == '') {
				str = date_time.getFullYear() + '-' + month + '-' + day + ' ' + hour + ':' + minute;
			} else {
				str = month + '-' + day;
			}

			return str;
		},
		getWhenDateDetailDot    : function (date) {
			let str;
			let date_time = new Date(date * 1000)
			let month = date_time.getMonth() + 1;
			let day = date_time.getDate();

			month = month >= 10 ? month : '0' + month;
			day = day >= 10 ? day : '0' + day;

			str = date_time.getFullYear() + '.' + month + '.' + day;

			return str;
		},
		getWhenDateDetailDash   : function (date) {
			let str;
			let date_time = new Date(date * 1000)
			let month = date_time.getMonth() + 1;
			let day = date_time.getDate();

			month = month >= 10 ? month : '0' + month;
			day = day >= 10 ? day : '0' + day;

			str = date_time.getFullYear() + '-' + month + '-' + day;

			return str;
		},
        getWhenDateDetailSeconds: function (date) {
            let str;
            let date_time = new Date(date * 1000)
            let month = date_time.getMonth() + 1;
            let day = date_time.getDate();
            let hour = date_time.getHours();
            let minute = date_time.getMinutes();
            let second = date_time.getSeconds();

            month = month >= 10 ? month : '0' + month;
            day = day >= 10 ? day : '0' + day;
            hour = hour >= 10 ? hour : '0' + hour;
            minute = minute >= 10 ? minute : '0' + minute;
            second = second >= 10 ? second : '0' + second;

            str = date_time.getFullYear() + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second;

            return str;
        },
		getStartOfWeek : function (date) {
			let startOfWeek = new Date(date);
			startOfWeek.setDate(date.getDate() - date.getDay() + (date.getDay() === 0 ? -6 : 1));
			return startOfWeek;
		},
		getEndOfWeek : function (startOfWeek) {
			let endOfWeek = new Date(startOfWeek);
			endOfWeek.setDate(startOfWeek.getDate() + 6);
			return endOfWeek;
		},
		getCurrentYearMonth : function () {
			const currentDate = new Date();
			const year = currentDate.getFullYear();
			// getMonth() 메서드는 0부터 시작하기 때문에 1을 더해줍니다.
			const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
			return `${year}-${month}`;
		},
		getCurrentYear : function () {
			const currentDate = new Date();
			const year = currentDate.getFullYear();
			return `${year}`;
		},

	}

	<?php // 필수 셋팅 사항 : ajaxUrl, drawGrid, getData ?>
	<?php // 페이지 로드시 _cmn.pagination.init(); _cmn.pagination.drawPagination(_cmn.pagination.drawGrid); 실행 ?>
	_cmn['pagination'] = {
		divSelector : '.pagination',	<?php // 페이지네이션이 그려질 태그의 선택자 ?>
		pageSelector : '.pagination a',	<?php // 페이지네이션의 페이지 숫자들 선택자 ?>
		responseTagVar : 'pagination',	<?php // res.result 에 담겨올 페이지네이션 변수명 ?>
		ajaxUrl : '',
		additionalInitParam : '',	<?php // 첫 화면 파라미터 설정 ?>
		addAdditionalInitParam : function(jsonAdditionalInitParam = {}){	<?php // 첫 화면 파라미터 설정 도와주는 함수 ?>
			for (let key in jsonAdditionalInitParam){
				_cmn.pagination.additionalInitParam += "&"+key+"="+jsonAdditionalInitParam[key];
			}
		},
		getParamStrFromJson : function(jsonData = {}){
			let str = '';
            for (let key in jsonData){
                if (key != _cmn.ajax.csrf_token_name && jsonData[key] !== undefined && jsonData[key] !== '') {
                    str += "&" + key + "=" + jsonData[key];
                }
            }
            return str;
		},
		init : function(additionalInitParam = {}){
			window.onpopstate = function(){
				_cmn.pagination.drawPagination(_cmn.pagination.drawGrid);
				for (let fncInFncArr of _cmn.pagination.fncArrSyncPageOptions){
					if(typeof fncInFncArr == 'function'){
						fncInFncArr();
					}
				}
			};
			$(document).on('click',_cmn.pagination.pageSelector, function(){
				if($(this).closest('li').hasClass('on')) return false;

				let paramStr = this.dataset.cond.split('?')[1];

				let chk_page = function(str){
					for (let key in _cmn.pagination.getParamJsonFromUrl(str)){
						if (key == 'page') {
							console.log(key);
							return true;
						}
					}
					return false;
				}

				if(!chk_page(paramStr)){
					paramStr += '&page=1';
				}

				window.history.pushState('','','?'+paramStr);
				_cmn.pagination.drawPagination(_cmn.pagination.drawGrid);
			})
		},
		getParamJsonFromUrl : function (str = ''){		<?php // 현재 url의 파라미터 string을 json 형태로 리턴 받는 함수 ?>
			let params;
			if(str != '') params = str.split('&');
			else params = window.location.search.substr(1).split('&');

			let result = {};
			let tmp = [];
			for(let item of params){
				if(item != '' && item != '?'){
					tmp = item.split('=');
					result[tmp[0]] = tmp[1];
				}
			}
			return result;
		},
		<?php
		// syncPageOptions
		// : 뒤로가기, 앞으로 가기 버튼 클릭시 검색 조건 동기화 함수들의 배열
		// 주의 : 함수 등록시 push()로 등록해야 한다.
		?>
		fncArrSyncPageOptions : [],
		setHistory : function(){
			let paramStr = '';

			let data = _cmn.pagination.getData();

			if(typeof data == 'string'){
				paramStr += data;
			}else if(typeof data == 'object'){
				paramStr += this.getParamStrFromJson(data);
			}else{
				console.log('error : _cmn.pagination.drawPagination - 잘못된 data 타입입니다.');
				return false;
			}

			if (paramStr == '' || paramStr == '?' || window.location.search == '' || window.location.search == '?') {
				paramStr += _cmn.pagination.additionalInitParam;
			}

			if(paramStr[0] == '&'){
				paramStr = paramStr.substring(1);
			}

			window.history.pushState('','','?'+paramStr);
		},
		getData : function(){	<?php // override 필요. ?>
			return {};
		},
		drawGrid : function(res){console.log(res);},
		drawPagination : function(cbFnc){
			// let data = window.location.search+"&"+_cmn.ajax.csrf_token_name+"="+_cmn.ajax.csrf_token;
			// let data = window.location.search+"&"+_cmn.ajax.csrf_token_name+"="+_cmn.ajax.csrf_token;
			_cmn.ajax.exec({
				url:_cmn.pagination.ajaxUrl+window.location.search,
				type:'GET',
				success: function(res){
					console.log(res)
					// $(_cmn.pagination.divSelector).html(res.result.pagination);
					$(_cmn.pagination.divSelector).html(res.result[_cmn.pagination.responseTagVar]);
					if (cbFnc !== undefined){
						if(typeof cbFnc == 'function') cbFnc(res);
						else console.log('error : _cmn.pagination.drawPagination - callback function 의 타입이 잘못되었습니다');
						return false;
					}

				}
			});
		},
		drawPage : function(){
			_cmn.pagination.setHistory();
			_cmn.pagination.drawPagination(_cmn.pagination.drawGrid);
		}
	};
	_cmn['instantPost'] = function(url, param){ //post를 통한 화면이동, param => array
		var form = document.createElement("form");
		// form.setAttribute("charset", "UTF-8");
		form.setAttribute("method", "post");  //Post 방식
		form.setAttribute("id", "instantForm");  //Post 방식
		//form.setAttribute("action", '<?php echo substr($this->config->item('base_url'),0,-1)?>'+url); //요청 보낼 주소
		form.setAttribute("action", url); //요청 보낼 주소
		$.each(param, function(key, val){
			var hiddenField = document.createElement("input");
			hiddenField.setAttribute("name", key);
			hiddenField.setAttribute("value", val);
			form.appendChild(hiddenField);
		});
		var hiddenField = document.createElement("input");
		hiddenField.setAttribute("name", _cmn.ajax.csrf_token_name);
		hiddenField.setAttribute("value", _cmn.ajax.csrf_token);
		form.appendChild(hiddenField);
		document.body.appendChild(form);

		form.submit();
	}
	_cmn['string'] = {
		getFirstUppercase : function(str){
			let string = str;
			return string.charAt(0).toUpperCase() + string.slice(1);
		}
	}
	_cmn['mathematics'] = {
		getFee : function(price){
			let Fee = parseFloat(price) / 10
			return Fee.toFixed(8);
		}
	}

	_cmn['uniqueId'] = {
		uuidv4: function () {
			return 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
				var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
				return v.toString(16);
			});
		}
	}

	/**
	 * 엑셀 다운로드
	 * @param fileName 엑셀파일명 (ex. excel.xls)
	 * @param sheetName 시트명
	 * @param headers 시트내용(html - table)
	 * 참조 : https://royzero.tistory.com/38
	 */
	_cmn['excel'] = {
		excelDownload: function(tbodyArr = [], theadObj = {}, filename){
			const tbl = _cmn.excel.drawTempTable(tbodyArr, theadObj);
			_cmn.excel.download(tbl, filename);
		},
		_excelDown : function(fileName, sheetName, sheetHtml) {
			var html = '';
			html += '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
			html += ' <head>';
			html += ' <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">';
			html += ' <xml>';
			html += ' <x:ExcelWorkbook>';
			html += ' <x:ExcelWorksheets>';
			html += ' <x:ExcelWorksheet>'
			html += ' <x:Name>' + sheetName + '</x:Name>'; // 시트이름
			html += ' <x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions>';
			html += ' </x:ExcelWorksheet>';
			html += ' </x:ExcelWorksheets>';
			html += ' </x:ExcelWorkbook>';
			html += ' </xml>';
			html += ' </head>';
			html += ' <body>';
			// ----------------- 시트 내용 부분 -----------------
			html += sheetHtml;
			// ----------------- //시트 내용 부분 -----------------
			html += ' </body>';
			html += '</html>';
			// 데이터 타입
			var data_type = 'data:application/vnd.ms-excel';
			var ua = window.navigator.userAgent;
			var blob = new Blob([html], {type: "application/csv;charset=utf-8;"});
			if ((ua.indexOf("MSIE ") > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) && window.navigator.msSaveBlob) {
				// ie이고 msSaveBlob 기능을 지원하는 경우
				navigator.msSaveBlob(blob, fileName);
			} else {
				// ie가 아닌 경우 (바로 다운이 되지 않기 때문에 클릭 버튼을 만들어 클릭을 임의로 수행하도록 처리)
				var anchor = window.document.createElement('a');
				anchor.href = window.URL.createObjectURL(blob);
				anchor.download = fileName;
				document.body.appendChild(anchor);
				anchor.click();

				// 클릭(다운) 후 요소 제거
				document.body.removeChild(anchor);
			}
		},
		download : function(sourceTableIdOrElement, fileName) {
			const file_name = fileName + '.xls' || "excelFile.xls";
			const table = (typeof sourceTableIdOrElement === 'string')
				? document.getElementById(sourceTableIdOrElement)
				: sourceTableIdOrElement;
			if (table) {
				// 엑셀다운 (엑셀파일명, 시트명, 내부데이터HTML)
				_cmn.excel._excelDown(file_name, "Sheet1", table.outerHTML)
			}else{
				console.log("Needed a table object.");
			}
		},
		drawTempTable : function(tbodyArr = [], theadObj = {}){
			const tempTable = document.createElement("table");
			tempTable.id = 'tempTableForExcelDownload';
			let tempTr;
			let tempTd;
			let is_head_empty = (JSON.stringify(theadObj) === '{}');

			if(!is_head_empty){
				const tempThead = document.createElement("thead");
				tempTr = document.createElement("tr");
				for(let key in theadObj){
					tempTd = document.createElement("td");
					tempTd.innerHTML = theadObj[key];
					tempTr.append(tempTd);
				}
				tempThead.append(tempTr);
				tempTable.append(tempThead);
			}

			const tempTbody = document.createElement("tbody");
			for (let item of tbodyArr) {
				tempTr = document.createElement("tr");
				if(!is_head_empty){
					for (let key in theadObj){
						tempTd = document.createElement("td");
						tempTd.innerHTML = item[key];
						tempTr.append(tempTd);
					}
				}else{
					for (let key in item) {
						tempTd = document.createElement("td");
						tempTd.innerHTML = item[key];
						tempTr.append(tempTd);
					}
				}

				tempTbody.append(tempTr);
			}
			tempTable.append(tempTbody);
			return tempTable;
		}
	}

	_cmn['format'] = {
		comma : function(number_string){
			return number_string.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
	}



	<?php // template 만드는 중 - replaceAll 에서 사용할 replaceKeywords 의 value를 어떻게 함수화 할 것인가? ?>
	// _cmn['template'] = {
	// 	item: {},
	// 	templateSelector : '',
	// 	templateObj : {},
	// 	keySeparatorOfStart : '{',
	// 	keySeparatorOfEnd : '}',
	// 	replaceKeywords : function(item){
	// 		'isFavor' : 'is_favor',
	// 		'12':Number(_cmn.template.item.min_price).toLocaleString()
	// 	},
	// 	getListHtml : function(listData){
	// 		_cmn.template.item = listData;
	//
	// 		if(_cmn.template.templateObj == {} && _cmn.template.templateSelector == '') {
	// 			console.log();
	// 		}
	// 		let listHtml = '';
	// 		let template = '';
	// 		for(let item of listData){
	// 			template = document.querySelector(_cmn.template.templateSelector).innerHTML;
	// 			for (let key in _cmn.template.replaceKeywords){
	// 				template.replaceAll(
	// 						_cmn.template.keySeparatorOfStart+key+_cmn.template.keySeparatorOfEnd
	// 						, _cmn.template.replaceKeywords[key]);
	// 			}
	// 			listHtml += template;
	// 		}
	// 		return listHtml;
	// 	}
	// }

</script>
