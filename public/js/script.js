document.getElementById("compatibility").addEventListener("change", function() {
    const compatibility = $("#compatibility option:selected").val();

    if (compatibility == 1) {
        $("#processor-brand").removeClass("d-none");
        deleteProcessorsDropdown();
    } else {
        $("#processor-brand").addClass("d-none");
        setupAjax();
        processorsDropdown();
    }
});

document.getElementById("processor-brand").addEventListener(
    "change",
    function() {
        const brandId = $("#processor-brand option:selected").val();

        setupAjax();
        processorsDropdown(brandId);
        motherboardsDropdown(brandId);
    },
    false
);

function convertToRupiah(angka) {
    var rupiah = "";
    var angkarev = angka
        .toString()
        .split("")
        .reverse()
        .join("");
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ".";
    return (
        "Rp. " +
        rupiah
        .split("", rupiah.length - 1)
        .reverse()
        .join("")
    );
}

function setupAjax() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
}

function deleteProcessorsDropdown() {
    $("#processor")
        .find("option")
        .remove()
        .end();

    $("<option/>", {
        text: "--Pilih Processor--",
        value: ""
    }).appendTo("#processor");
}

function processorsDropdown(brandId = null) {
    $.ajax({
        type: "POST",
        url: "user/simulasi/processors",
        data: {
            brand_id: brandId
        },
        success: function(processors) {
            deleteProcessorsDropdown();

            processors.forEach(processor => {
                $("<option/>", {
                    text: processor.name +
                        " - " +
                        convertToRupiah(processor.price),
                    value: processor.id,
                    data: {
                        price: processor.price
                    }
                }).appendTo("#processor");
            });
        },
        error: function(data, textStatus, errorThrown) {
            console.log(data);
        }
    });
}

function motherboardsDropdown(processorBrandId = null) {
    $.ajax({
        type: "POST",
        url: "user/simulasi/motherboards",
        data: {
            processor_brand_id: processorBrandId
        },
        success: function(motherboards) {
            deleteMotherboardsDropdown();

            motherboards.forEach(motherboard => {
                $("<option/>", {
                    text: motherboard.name +
                        " - " +
                        convertToRupiah(motherboard.price),
                    value: motherboard.id,
                    data: {
                        price: motherboard.price
                    }
                }).appendTo("#motherboard");
            });
        },
        error: function(data, textStatus, errorThrown) {
            console.log(data);
        }
    });
}

function deleteMotherboardsDropdown() {
    $("#motherboard")
        .find("option")
        .remove()
        .end();

    $("<option/>", {
        text: "--Pilih Motherboard--",
        value: ""
    }).appendTo("#motherboard");
}

function onChangeUpdatePrice(el, y) {
    let price;
    switch (el.attr("id")) {
        // harga processor
        case "processor":
            $("#processor_qty").val(1);
            price = el.find(":selected").data("price");

            $("#processor_price").data("price", price);
            $("#processor_price").val(price);
            break;
        case "processor_qty":
            price = $("#processor :selected").data("price") * 1 * el.val();

            $("#processor_price").data("price", price);
            $("#processor_price").val(price);
            break;

            // harga motherboard
        case "motherboard":
            $("#motherboard_qty").val(1);
            price = el.find(":selected").data("price");

            $("#motherboard_price").data("price", price);
            $("#motherboard_price").val(price);
            break;

        case "motherboard_qty":
            price = $("#motherboard :selected").data("price") * 1 * el.val();

            $("#motherboard_price").data("price", price);
            $("#motherboard_price").val(price);
            break;

            // harga ram
        case "ram":
            $("#ram_qty").val(1);
            price = el.find(":selected").data("price");

            $("#ram_price").data("price", price);
            $("#ram_price").val(price);
            break;

        case "ram_qty":
            price = $("#ram :selected").data("price") * 1 * el.val();

            $("#ram_price").data("price", price);
            $("#ram_price").val(price);
            break;

            // harga hdd
        case "hdd":
            $("#hdd_qty").val(1);
            price = el.find(":selected").data("price");

            $("#hdd_price").data("price", price);
            $("#hdd_price").val(price);
            break;

        case "hdd_qty":
            price = $("#hdd :selected").data("price") * 1 * el.val();

            $("#hdd_price").data("price", price);
            $("#hdd_price").val(price);
            break;

            // harga ssd
        case "ssd":
            $("#ssd_qty").val(1);
            price = el.find(":selected").data("price");

            $("#ssd_price").data("price", price);
            $("#ssd_price").val(price);
            break;

        case "ssd_qty":
            price = $("#ssd :selected").data("price") * 1 * el.val();

            $("#ssd_price").data("price", price);
            $("#ssd_price").val(price);
            break;

            // harga casing
        case "casing":
            $("#casing_qty").val(1);
            price = el.find(":selected").data("price");

            $("#casing_price").data("price", price);
            $("#casing_price").val(price);
            break;

        case "casing_qty":
            price = $("#casing :selected").data("price") * 1 * el.val();

            $("#casing_price").data("price", price);
            $("#casing_price").val(price);
            break;

            // harga vga
        case "vga":
            $("#vga_qty").val(1);
            price = el.find(":selected").data("price");

            $("#vga_price").data("price", price);
            $("#vga_price").val(price);
            break;

        case "vga_qty":
            price = $("#vga :selected").data("price") * 1 * el.val();

            $("#vga_price").data("price", price);
            $("#vga_price").val(price);
            break;

            // harga psu
        case "psu":
            $("#psu_qty").val(1);
            price = el.find(":selected").data("price");

            $("#psu_price").data("price", price);
            $("#psu_price").val(price);
            break;

        case "psu_qty":
            price = $("#psu :selected").data("price") * 1 * el.val();

            $("#psu_price").data("price", price);
            $("#psu_price").val(price);
            break;

            // harga keyboard
        case "keyboard":
            $("#keyboard_qty").val(1);
            price = el.find(":selected").data("price");

            $("#keyboard_price").data("price", price);
            $("#keyboard_price").val(price);
            break;

        case "keyboard_qty":
            price = $("#keyboard :selected").data("price") * 1 * el.val();

            $("#keyboard_price").data("price", price);
            $("#keyboard_price").val(price);
            break;

            // harga mouse
        case "mouse":
            $("#mouse_qty").val(1);
            price = el.find(":selected").data("price");

            $("#mouse_price").data("price", price);
            $("#mouse_price").val(price);
            break;

        case "mouse_qty":
            price = $("#mouse :selected").data("price") * 1 * el.val();

            $("#mouse_price").data("price", price);
            $("#mouse_price").val(price);
            break;

            // harga mousePad
        case "mousePad":
            $("#mousePad_qty").val(1);
            price = el.find(":selected").data("price");

            $("#mousePad_price").data("price", price);
            $("#mousePad_price").val(price);
            break;

        case "mousePad_qty":
            price = $("#mousePad :selected").data("price") * 1 * el.val();

            $("#mousePad_price").data("price", price);
            $("#mousePad_price").val(price);
            break;

        default:
            break;
    }

}