
<style>

    *{
        font-family: Arial, serif;
    }
    table{
        width: 100%;
    }
    table.header{
        /*border: 1px #000000 solid;  background: #cccccc*/
    }
    h1.title{
        /*text-align: center;*/
        width: 100%;
    }
    h1.certificate{
        text-align: center;
        width: 100%;
        font-size: 30px;
        color: #0a3b54;
    }
    h1.title{
        font-size: 40px;
        padding: 0;
        margin: 0;
    }
    td.a-header{
        width: 100%;
        text-align: center;
        font-size: 30px;
    }
    td.a-name{
        width: 100%;
        text-align: center;
        font-size: 40px;
    }
    td.a-company{
        width: 100%;
        text-align: center;
        font-size: 60px;
    }
</style>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <page_header>
        <table class="header">
            <tr>
                <td style="width: 25%; text-align: left; padding: 0; margin: 0">
                    <h1 class="title">
                        <img src="http://127.0.0.1/mentor/images/2030.jpg" width="120" alt="a">
                    </h1>
                </td>
                <td style="width: 50%; text-align: center"></td>
                <td style="width: 25%; text-align: right; padding: 0; margin: 0">
                    <h1 class="title">
                        <img src="http://127.0.0.1/mentor/images/logo.jpg" width="120" alt="a">
                    </h1>
                </td>
            </tr>
        </table>
    </page_header>
    <h1 class="certificate">
        General Volunteer Certificate
    </h1>
    <br><br>
    <table>
        <tr>
            <td class="a-header">The Mentor platform certifies that</td>
        </tr>
        <tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr>
        <tr>
            <td class="a-name"><?php echo $_SESSION['userinfo']['name'] ?></td>
        </tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr>
            <td class="a-header">He has contributed to achieving the goal of the Kingdom's Vision 2030 by implementing
                <?php echo $_SESSION['userinfo']['volunteer_hour'] ?> volunteer hours</td>
        </tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr><tr><td class="a-header"></td></tr>
        <tr>
            <td class="a-company"></td>
        </tr>
    </table>


    <page_footer>
        <table>
            <tr>
                <td style="width: 100%; text-align: center">
                    STUDENT MENTORSHIP SYSTEM
                </td>
            </tr>
        </table>
    </page_footer>

</page>
