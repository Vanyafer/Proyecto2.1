$(document).ready(function() {

    const getValueFromRoot = name => {
        return getComputedStyle(document.documentElement, null).getPropertyValue(name);
    }

    const setValueToRoot = params => {

        document.documentElement.style.setProperty('--default-bg', `#${params.bg}`)
        document.documentElement.style.setProperty('--default-navbar', `#${params.navbar}`)
        document.documentElement.style.setProperty('--default-btn', `#${params.btn}`)
        document.documentElement.style.setProperty('--default-input', `#${params.input}`)

    }

    $('.jscolor').change(function() {
        setValueToRoot({
            navbar: $("#navbar").val(),
            bg: $("#bg").val(),
            btn: $('#btn').val(),
            input: $('#input').val()
        });
    })
    
    $("input:radio[name=TipoP]").click(function() {	 

        let current = $('input:radio[name=TipoP]:checked').val();

        if( current == "Y"){
            $("#navbar").val("7F7606");
            $("#bg").val("E5D53E");
            $("#btn").val("BFB20A");
            $("#input").val("BFB20A");
            setValueToRoot({
              navbar: "7F7606",
              bg: "E5D53E",
              btn: "BFB20A",
              input: "BFB20A"
            });
        }
        if( current == "C"){
            $("#navbar").val("121F27");
            $("#bg").val("E4EEF0");
            $("#btn").val("416275");
            $("#input").val("BBCFDA");
            setValueToRoot({
                navbar: "121F27",
                bg: "E4EEF0",
                btn: "416275",
                input: "BBCFDA"
            });
        }
        if( current == "W"){
            $("#navbar").val("AA0000");
            $("#bg").val("F2F2F2");
            $("#btn").val("D43600");
            $("#input").val("FFCA00");
            setValueToRoot({
                navbar: "AA0000",
                bg: "F2F2F2",
                btn: "D43600",
                input: "FFCA00"
            });
        }        
        
        $("#navbar").focus()
        $("#bg").focus()
        $("#btn").focus()
        $("#input").focus()
        $("#navbar").focus()
        
    });

})

