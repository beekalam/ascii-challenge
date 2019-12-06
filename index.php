<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</head>
<body class="container mt-5 ml-1">
<div class="row">
    <div class="col-4">

        <form action="" class="form form-vertical" id="my-form">
            <div class="form-group">
                <label for="shape">Shape</label>
                <select name="shape" id="shape" class="form-control">
                    <option value="star">Star</option>
                    <option value="tree">Tree</option>
                </select>
            </div>

            <div class="form-group">
                <label for="star-size">Size</label>
                <select name="star-size" id="star-size" class="form-control">
                    <option value="5">5 (small)</option>
                    <option value="7">7 (medium)</option>
                    <option value="11">11 (large)</option>
                    <?php for ($i = 13; $i < 100; $i += 2): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="form-group" style="display:none;">
                <label for="size">Size</label>
                <select name="tree-size" id="tree-size" class="form-control">
                    <option value="5">5 (small)</option>
                    <option value="7">7 (medium)</option>
                    <option value="11">11 (large)</option>
                    <?php for ($i = 13; $i < 100; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="delim-char">Delimiter character</label>
                        <select name="delim-char" id="delim-char" class="form-control">
                            <option value="x" selected>x</option>
                            <?php for ($i = 0; $i < 126; $i++): ?>
                                <?php if (ctype_print(chr($i)) && !ctype_cntrl(chr($i))): ?>
                                    <option value="<?php echo chr($i); ?>">
                                        <?php echo chr($i); ?>
                                    </option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="delim-char">Delimiter color</label>
                        <input type="color" class="form-control" id="delim-color">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="space-char">space character</label>
                        <select name="space-char" id="space-char" class="form-control">
                            <option value="" selected></option>
                            <?php for ($i = 0; $i < 126; $i++): ?>
                                <?php if (ctype_print(chr($i)) && !ctype_cntrl(chr($i))): ?>
                                    <option value="<?php echo chr($i); ?>">
                                        <?php echo chr($i); ?>
                                    </option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="space-char">space color</label>
                        <input type="color" class="form-control" id="space-color">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="decoration-char">Decoration character</label>
                        <select name="decoration-char" id="decoration-char" class="form-control">
                            <option value="+" selected></option>
                            <?php for ($i = 0; $i < 126; $i++): ?>
                                <?php if (ctype_print(chr($i)) && !ctype_cntrl(chr($i))): ?>
                                    <option value="<?php echo chr($i); ?>">
                                        <?php echo chr($i); ?>
                                    </option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="decoration-color">Decoration color</label>
                        <input type="color" class="form-control" id="decoration-color">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="font-size">Font size</label>
                <input type="number" min="5" max="72" id="font-size" class="form-control" value="26">
            </div>
            <button type="submit" id="form-submit" class="form-control btn-primary">submit</button>
        </form>

    </div>
    <div class="col-8" id="result" style="overflow-x: visible">
    </div>
</div>
</body>
<script>
    function buildUrl() {
        let rand   = Math.round(Math.random() * 1000);
        let params = {
            'shape': $("#shape").val(),
            'star-size': $("#star-size").val(),
            'tree-size': $("#tree-size").val(),
            'delim': $("#delim-char").val(),
            'delim-color': $("#delim-color").val(),
            'space': $("#space-char").val(),
            'space-color': $("#space-color").val(),
            'decoration': $("#decoration-char").val(),
            'decoration-color': $("#decoration-color").val(),
            'font-size': $("#font-size").val(),
            'no-cache': rand
        };

        params = Object.keys(params)
            .map(k => encodeURIComponent(k) + "=" + encodeURIComponent(params[k]))
            .join("&");
        return '/ajax.php?' + params;
    }

    $(document).ready(function () {

        $("#my-form").submit(function (e) {
            e.preventDefault();
            $.get(buildUrl(), function (data) {
                $("#result").html(data);
            });
        });

        $("#shape").on('change', function (e) {
            if ($(this).val() == 'tree') {
                $("#star-size").parent().hide();
                $("#tree-size").parent().show();
            } else {
                $("#star-size").parent().show();
                $("#tree-size").parent().hide();
            }
        });
    });
</script>
</html>

