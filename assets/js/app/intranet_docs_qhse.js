//---------------------------------------------------------------------------------------------------------------------------------------------------------
// Create the navbar
var docsQhseNavigationList = [];
var positionSeparsub = 0;
var positionTitle = 1;

// Table with subemenus parent ids
var parent_ids = [];

// Variable for pdfImg value
var pdfImgSwitch;

//---------------------------------------------------------------------------------------------------------------------------------------------------------
// Close the documents window
function retourMenuDocQhse() {
    $(".submenus_trigger2").hide("slide", 300);
    $(".main_icon").delay(200).fadeIn(500);

    var codem=codem;

    docsQhseNavigationList = [];
    parent_ids = [];

    $.ajax({
        type: 'GET',
        url: 'ajax/main_menu_ajax.php',
        data: 'codem='+codem + '&pdfImg='+pdfImgSwitch,
        dataType: 'html',
        success: function(data) {
            $(".submenus_trigger2").html(" ");
        }
    });
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
// FUNCTION FOR NAVIGATION IN BREADCRUMB
function docsAndQhseNavigation(id, codem, position, titlemenu) {
    var id = id;
    var codem = codem;
    var titlemenu = titlemenu;

    var positonDocQhse = position+2;
    var positionParentIds = positonDocQhse/2;

    docsQhseNavigationList = docsQhseNavigationList.slice(0, positonDocQhse);
    parent_ids = parent_ids.slice(0, positionParentIds);

    $.ajax({
        type: 'GET',
        url: 'ajax/ajax_lst_doc.php',
        data: 'id=' + id + '&codem=' + codem + '&pdfImg=' + pdfImgSwitch + '&titlemenu=' + titlemenu,
        dataType: 'html',
        success: function(data) {
            $(".submenus_trigger2").html(" ");
            $(".submenus_trigger2").append(data);

        }
    });
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
// CONSTRUCT SUBMENUS AND NAV WHEN CLICK ON FOLDERS
//NAVIGATE DOCS IN LIST MODE
function docsAndQhseNavConstruct(name,id,p_id,codem,titlemenu) {
    var name = name;
    var folder_parent_id = p_id;
    var parent_id = id;
    var codem = codem;
    var titlemenu = titlemenu;

    positionTitle = $(".documents_breadcrumb .submenu_titlesubmenu").length;
    positionSeparsub = $(".documents_breadcrumb .submenu_separsub").length;
    positionTitle = positionTitle+positionSeparsub;

    docsQhseNavigationList.push('<span class="submenu_separsub"> | </span>');
    docsQhseNavigationList.push('<p class="submenu_titlesubmenu" onClick="docsAndQhseNavigation('+id+','+codem+','+positionTitle+',\''+titlemenu+'\')">' + name + '</p>');

    parent_ids.push(folder_parent_id);

    $.ajax({
        type: 'GET',
        url: 'ajax/ajax_lst_doc.php',
        data: 'name=' + name + '&id=' + id + '&codem=' + codem + '&pdfImg='+pdfImgSwitch + '&titlemenu=' + titlemenu,
        dataType: 'html',
        success: function(data) {
            $(".submenus_trigger2").html(" ");
            $(".submenus_trigger2").append(data);

        }
    });
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
// FUNCTION RETURN BACKWARD
function returnToParentFolder(codem, titlemenu){
	var parent_id=parent_ids[parent_ids.length-1];
	var codem=codem;
    var titlemenu = titlemenu;
    var url;

	var menu_length = docsQhseNavigationList.length;
    var parent_ids_length = parent_ids.length;


	if (menu_length <= 2) {
		docsQhseNavigationList = [];
        parent_ids = [];
		url = 'ajax/main_menu_ajax.php';

	}else if (menu_length > 2) {
		docsQhseNavigationList = docsQhseNavigationList.slice(0, menu_length-2);
        parent_ids = parent_ids.slice(0, parent_ids_length-1);
		url = 'ajax/ajax_lst_doc.php';

	}

	$.ajax({
		type: 'GET',
		url: url,
		data: 'codem='+codem + '&id='+parent_id + '&pdfImg='+pdfImgSwitch + '&titlemenu=' + titlemenu,
		dataType: 'html',
		success: function(data) {
			$(".submenus_trigger2").html(" ");
			$(".submenus_trigger2").html(data);

		}
	});
}

// BACK TO DOCS ROOT LEVEL
function retourdocuments(codem, titlemenu) {
    var codem=codem;
    var titlemenu = titlemenu;

    if (codem == 11 | codem == 16) {
        docsQhseNavigationList = [];
        parent_ids = [];

        $.ajax({
            type: 'GET',
            url: 'ajax/main_menu_ajax.php',
            data: 'codem='+codem  + '&titlemenu=' + titlemenu + '&pdfImg='+pdfImgSwitch,
            dataType: 'html',
            success: function(data) {
                $(".submenus_trigger2").html(" ");
                $(".submenus_trigger2").html(data);

            }
        });
    }
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------
//PASS TO PDF LIST MODE
function loadDocsList(codem,titlemenu,id){
	var codem=codem;
	var id=id;

    pdfImgSwitch = 0;

	var menu_length = docsQhseNavigationList.length;
	var url;

	if (menu_length == 0) {
		url = 'ajax/main_menu_ajax.php';

	}else if (menu_length > 0) {
		url = 'ajax/ajax_lst_doc.php';

	}

    $.ajax({
        type: 'GET',
        url: url,
        data: 'codem=' + codem + '&id=' + id + '&pdfImg=0' + '&titlemenu=' + titlemenu,
        dataType: 'html',
        success: function(data) {
            $(".submenus_trigger2").html(" ");
            $(".submenus_trigger2").html(data);

        }
    });
}

//PASS TO PDF IMAGE MODE
function loadDocsImages(codem,titlemenu,id){
	var codem=codem;
	var id=id;

    pdfImgSwitch = 1;

	var menu_length = docsQhseNavigationList.length;
	var url;

	if (menu_length == 0) {
		url = 'ajax/main_menu_ajax.php';

	}else if (menu_length > 0) {
		url = 'ajax/ajax_lst_doc.php';

	}

    $.ajax({
        type: 'GET',
        url: url,
        data: 'codem=' + codem + '&id=' + id + '&pdfImg=1' + '&titlemenu=' + titlemenu,
        dataType: 'html',
        success: function(data) {
            $(".submenus_trigger2").html(" ");
            $(".submenus_trigger2").html(data);

        }
    });
}


//---------------------------------------------------------------------------------------------------------------------------------------------------------
// FUNCTION SEARCH IN DOCS
function docsQhseSearch() {
    // Retrieve the input field text and reset the count to zero
    var filter = $("#filter_docs_qhse").val();
    count = 0;

    // Loop through the comment list
    $('.docs_table .docs_qhse_tr').each(function() {

        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();

            // Show the list item if the phrase matches and increase the count by 1
        } else {
            $(this).show();
            count++;
        }
    });
}

function docsQhseSearchImg() {
    // Retrieve the input field text and reset the count to zero
    var filter = $("#filter_docs_qhse_img").val();
    count = 0;

    // Loop through the comment list
    $('.files_display .docs_qhse_img').each(function() {

        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();

            // Show the list item if the phrase matches and increase the count by 1
        } else {
            $(this).show();
            count++;
        }
    });
}


//---------------------------------------------------------------------------------------------------------------------------------------------------------
// DISPLAY PFD SMALL FORMAT
function displayPdfContent(id){
	var id=id;

    $('.modal-content').load('ged/documents.php?id='+id,function(){
        $('.bd-example-modal-lg').modal({show:true});
    });
}
