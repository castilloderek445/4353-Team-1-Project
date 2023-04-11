<?php
    include_once 'navbar.php';   
    include_once 'connect.php';

    if (!isset($_SESSION["newestSuggPrice"]) && !isset($_SESSION["newestQuote"])){ 
        header("location: getQuote.php");
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Get Quote part 2</title>
        <link rel="stylesheet" href="css/style_quoteResults.css">
    </head>
    <div class="clientMain">
        <div class="sub">
            <table class="notiTable2">
                <tr>
                    <th><label for="suggested_price">Suggested Price:</label></th>
                    <td>
                        <!-- EDIT: this is supposed to be a noneditable price per gallon, just put in a number -->
                        <input type="text" name="suggPrice" placeholder="(suggested price from pricing module)" class ="getQuote_text_input" 
                        value="<?php echo $_SESSION['newestSuggPrice']; ?>"
                        readonly="">
                    </td>
                </tr>

                <tr>
                    <!-- echo the price here i think -->
                    <th><label for="amount_due">Amount Due:</label></th>
                    <td><input type="text" name="amtDue" placeholder="(gallons*suggested_price)" class ="getQuote_text_input" 
                    value="<?php echo $_SESSION['newestQuote']; ?>"
                    readonly=""></td>
                </tr>
            </table>

            <div class="clientButtons"> 
                <form action="backend/saveQuote.php "  method=post>
                        <button class="clientButton" type="submit" name="submit" role="button" >Save Quote</button>
                </form>
                <button class="clientButton" onClick="location.href = 'getQuote.php';">Cancel</button>

            </div>

        </div>
    </div>
</html>