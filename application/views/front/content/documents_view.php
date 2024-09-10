
<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20"><?=$this->lang->line('doc_title')//Documents?></h1>
        </div>
    </header>


    <!-- SECTION 1 -->
    <section class="grid">
        <div class="s-12 center background-dark">
            <table>
                <thead>
                    <tr class="background-blue text-size-20 ">
                        <th class="align-center">No</th>
                        <th>Documents</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-size-16">
                        <td class="text-dark">1</td>
                        <td class="text-dark"><?=$this->lang->line('doc_01')//Application form?></td>
                        <td class="text-dark"></td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">2</td>
                        <td class="text-dark"><?=$this->lang->line('doc_02')//Student's Passport?></td>
                        <td class="text-dark"></td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">3</td>
                        <td class="text-dark"><?=$this->lang->line('doc_03')//Family registration?></td>
                        <td class="text-dark"><?=$this->lang->line('doc_03_01')//Documents within 3 months of issuance?></td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">4</td>
                        <td class="text-dark"><?=$this->lang->line('doc_04')//Financial explanation?></td>
                        <td class="text-dark"><?=$this->lang->line('doc_04_01')//Documents within 1 month of issuance?></td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">5</td>
                        <td class="text-dark"><?=$this->lang->line('doc_05')//Graduation Diploma <br>(Must be verified by Korean embassy)?></td>
                        <td class="text-dark">
                            <?=$this->lang->line('doc_05_01')//Cần dấu chứng nhận hợp pháp hóa lãnh sự của Đại sứ quán Việt Nam, và dấu công chứng xác nhận (màu tím) của Đại sứ quán Hàn Quốc.?>
                        </td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">6</td>
                        <td class="text-dark"><?=$this->lang->line('doc_06')//School Record <br>(Must be verified by Korean embassy)?></td>
                        <td class="text-dark">
                            <?=$this->lang->line('doc_05_01')//Cần dấu chứng nhận hợp pháp hóa lãnh sự của Đại sứ quán Việt Nam, và dấu công chứng xác nhận (màu tím) của Đại sứ quán Hàn Quốc.?>
                        </td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">7</td>
                        <td class="text-dark"><?=$this->lang->line('doc_07')//Certificate of employment or business license (If any)?></td>
                        <td class="text-dark">
                            <?=$this->lang->line('doc_07_01')//Cần dấu chứng nhận hợp pháp hóa lãnh sự của Đại sứ quán Việt Nam, và dấu công chứng xác nhận (màu tím) của Đại sứ quán Hàn Quốc.?>
                        </td>
                    </tr>
<!--                    <tr class="text-size-16">-->
<!--                        <td class="text-dark">8</td>-->
<!--                        <td class="text-dark">--><?php //=$this->lang->line('doc_08')//Annual income certificate?><!--</td>-->
<!--                        <td class="text-dark">-->
<!--                            --><?php //=$this->lang->line('doc_04_01')//Cần có bảng lương hoặc hợp đồng lao động đối với gia đình học sinh có bố mẹ là công nhân viên chức.
//                            // Nếu gia đình là hộ kinh doanh tự do thì phải có dấu xác nhận của địa phương.?>
<!--                        </td>-->
<!--                    </tr>-->
                    <tr class="text-size-16">
                        <td class="text-dark">8</td>
                        <td class="text-dark"><?=$this->lang->line('doc_09')//Deposit bank account(over $12000 balance)?></td>
                        <td class="text-dark">
                            <?=$this->lang->line('doc_09_01')//Cần có bảng lương hoặc hợp đồng lao động đối với gia đình học sinh có bố mẹ là công nhân viên chức.
                            // Nếu gia đình là hộ kinh doanh tự do thì phải có dấu xác nhận của địa phương.?>
                        </td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">9</td>
                        <td class="text-dark"><?=$this->lang->line('doc_10')//Parent's ID card?></td>
                        <td class="text-dark">

                        </td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">10</td>
                        <td class="text-dark"><?=$this->lang->line('doc_11')//Birth certificate?></td>
                        <td class="text-dark"></td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">11</td>
                        <td class="text-dark"><?=$this->lang->line('doc_12')//Insurance (if any)?></td>
                        <td class="text-dark"></td>
                    </tr>
                    <tr class="text-size-16">
                        <td class="text-dark">12</td>
                        <td class="text-dark"><?=$this->lang->line('doc_13')//Picture?></td>
                        <td class="text-dark">
                            <?=$this->lang->line('doc_13_01')//ID Photo or any?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="s-12 l-6 center margin-top text-size-16 text-white table-p">
                <?=$this->lang->line('doc_14')?>
            </p>
        </div>
    </section>
</main>