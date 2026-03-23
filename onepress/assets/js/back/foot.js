/************************************************/
/*	javaScript集 下で呼び出す	*/
/*						*/
/************************************************/
//document.write ( 'てすてす開始 foot.js' );

/*
	スマホ対応スワイプのトリガー
*/
var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		parallax: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		paginationClickable: true,
		speed:900,
		autoplay:5000,

});

//document.write ( 'てすてす完了 foot.js' );

