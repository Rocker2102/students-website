<?php
    if(isset($_GET['drive'])) {
        $drive_stat = $_GET['drive'];

        if ($drive_stat == "true") {
            $tab = $_GET['tid'];
            $section = $_GET['sid'];
            $fid = $_GET['fid'];
            $link_availability = 1;
            $link = "https://studentsnitsk.ml/website/";

            if ($tab == "sem1") {
                if ($section == 1) {    // sem1 exams section
                    $link_availability = 0;
                }
                else if ($section == 2) {   // sem1 cs11101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1ry32iB5XuzKwTLhVCLeHD_w_Np0FmotJ/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1bE_osaGmsqk0PJhxO93PVi8iCN0I-t8S/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1anP8i_-y9AXpdav7DJh9ft0emO3_t2Ft/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1JoCpmyY7oX8jjL1OtTmBXdE14zZQHJ48/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1glnk1j3vThaN7Q5cyOIJ8ZSJJgiR9tiM/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1HbSoP14zmAzQizgZt1HT0A0O8Z2wivCd/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1uirK_kSBm6Ght6EsswB7mKWp4G09-UkA/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 3) {   // sem1 cs11102
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1jOwWGYHd2b2Uk2Td7LsNy8GwvBbBlkAf/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1p0Rdr_VkSyTTuC1ojlSDwY_B_KNvd3G4/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/140dDYAkD8PtQPAP8-C6M0YWJ5wfebjlT/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1iV536Bfa612m3ljGEA-M09zKr8S_76yT/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1vp29YAMYvVJRpFCSqm5ohhndAE0Dxdhs/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1cOWIZCmufVz6RC7LE0ixaol-Vzy6pj_2/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 4) {   // sem1 ee11101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1T2wWO_domNYQwJcA6OzXzNkEtOafhKOz/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1z52jXi9ILgXScAcF477S0UBUAZVo0DPq/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/13cdhPmBX9ry02KE5BdTAtfb0IPqpvaab/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/13IB5FSV4pqQYRCJwn79R1EgS4JaFhbWx/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1V1JbLBSf6idOvfCoUZGdeVTlTzaHc40I/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1CI4tc-JYwyqfb-pMo---czQAZ5AIV5_h/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1MVn_cMWf1EifY7nYBm8knDhjYY8Jmvc-/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/1v8RNlEBu1plDYKiw7YyLoczFvJvlatbx/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/14eiaXjQmABLdPwfVwiXoTn0I9F5aSZmr/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/1rauyYBkBE9J1MiQADNXssvFoAIYb2Q1G/view?usp=sharing"; break;
                        case 11: $link = "https://drive.google.com/file/d/1v3Ux3FZDHTRygP3zli9as2zd6mr6zLeo/view?usp=sharing"; break;
                        case 12: $link = "https://drive.google.com/file/d/1fXHO06dxEQ5CQWeAsVjEUuFEGqy4QUUM/view?usp=sharing"; break;
                        case 13: $link = "https://drive.google.com/file/d/1I6iWLbnREqbL8oYGaeMAKv_q4vKWJ5pj/view?usp=sharing"; break;
                        case 14: $link = "https://drive.google.com/file/d/1vdKC0cOXUFseP63ZNpr1NQDlbHAgjrl1/view?usp=sharing"; break;
                        case 15: $link = "https://drive.google.com/file/d/1wI3MlULj0xD9WDYGUSzkuxeWKvYzaRZV/view?usp=sharing"; break;
                        case 16: $link = "https://drive.google.com/file/d/12bJ1-OVva3IAs3LuqKyMLeHmYQWb5qOI/view?usp=sharing"; break;
                        case 17: $link = "https://drive.google.com/file/d/1FS2VKkpJtIvLFsLmWUY5FFkQt7AWyTpT/view?usp=sharing"; break;
                        case 18: $link = "https://drive.google.com/file/d/10e2Bv2cIkkPAUAUZj4MFvkP1hBOqhJPl/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 5) {   // sem1 hs11101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1mslHtpChe6o021Bz46VWr5BuaQr4Ji7M/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1-9BBudLf7z53mgvaeGGtFv6NSCNeB0E9/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1oYX-jd6QV0hGI078qr1R_fEvtmIGTEwG/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1-ax9UW3g6huUzqf0RgUzGJSdKFXfHdRX/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1opYonrwcGXyCL3lWoANQl5LPE7arBCwk/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1d1EMgrULp_bP7F0ixmU_IkIWISyZlfsb/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/14HdwSuoTtkQiTKn22Mu_GMvt7HCZvYk9/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/1vwIy1G4m6tjEuT7PN0awmcIC1hUNeXnP/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/1Y1Av6dysodMRuTrjRxUBnfoUhMCBOIYL/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/1lBPfM4D9NLUqfDmpBhia-ivtwBOQNOfV/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 6) {   // sem1 ma11101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1RZt_Fm_S8NZGDKM_I9Azywm0okJJa7FQ/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1sM4wbFW6TA_UH-IiPbBHc6xm6YdVD5IJ/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1-VlaazBgHEPzloLz09UHXmGMcvgfsfwV/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1w3BB3rSGQuKez1kGKzvA1p-EhTQQqqqY/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1bcGSrZNx9kAfB732_qkBe_ob4C-s0sX7/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1IQ6glMHwYWGUWYAlCosPR8xlZyG7np-w/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1Pr-jzZfLZ5FM3wQtMphFtSysoZACcHkE/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/1uaQwjA_2sN90c1aDP4amZEQ7waY50ibE/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/1ZVLJZfDtkL6dieLdrxz67kmOuhjlb0Dl/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/1ZJx9dBN7R42jWX_mQ0gfJEhk_jQPk9v_/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 7) {   // sem1 ph11101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/18Up3XJHMf9WThpWT9_8t4EnH5I50dbUZ/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1VCC9FS4W1bPbiaSZvlGCP7_u4LwvDdSX/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else {
                    $link_availability = 0;
                }
            }
            else if ($tab == "sem2") {
                if ($section == 1) {   // sem2 exams section
                    switch ($fid) {
                        case 1: $link_availability = 0; break;
                        case 2: $link = "https://drive.google.com/file/d/1-wvlrT2TVZ42mUO9dJWmgA2tWgwvJqve/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/101TH8rkTQ0lDrqWOii0nLrquFvX2jEHj/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/10E9tEPvjsooyJMMaO_njHn6JVZ4dIcTn/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/10ICZygppQ9pumfkX4FQqRDGazczCpDCw/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/10PS5GriIKQ4l_TjLDbDwjou9cLIvkcYT/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/10Us90EYkn5Z5R4puQ-wcKisaaxbRht5j/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/10VNDVCO1n_KThYmBeTJLk517U7fK_0dy/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/10YyCA-sfsoyop7Y31cGVRTTQ29-5Sp2h/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/10_mNw53jvhconpmw5x_KfLpRxAN3yXDB/view?usp=sharing"; break;
                        case 11: $link = "https://drive.google.com/file/d/10boJD3npqXGEAAI51nZvdLKzmpI4hB9f/view?usp=sharing"; break;
                        case 12: $link = "https://drive.google.com/file/d/10eLcF3vMCS1NX1fXGoP1pGjPqAJYjkRt/view?usp=sharing"; break;
                        case 13: $link = "https://drive.google.com/file/d/1-7a1LPaWlPamH8v7kWeo-LLXtdY7SHes/view?usp=sharing"; break;
                        case 14: $link = "https://drive.google.com/file/d/1-B-c6MzhgxLpsFT0m9Cb9e3e21Pk0vHR/view?usp=sharing"; break;
                        case 15: $link = "https://drive.google.com/file/d/1-Gvl5p7HfaLpPxj0E6PT6zSVFhNUE5dY/view?usp=sharing"; break;
                        case 16: $link = "https://drive.google.com/file/d/1-QDjmB7Ucv3WgddtRnurRgzrVrgRYxSa/view?usp=sharing"; break;
                        case 17: $link = "https://drive.google.com/file/d/1-ZyOKL8_mhQnXYJDfAYtKCxuAGJIcur_/view?usp=sharing"; break;
                        case 18: $link = "https://drive.google.com/file/d/1-bwGew-CtoLhPeoJtNlKNQ5iMKqHzA5n/view?usp=sharing"; break;
                        case 19: $link = "https://drive.google.com/file/d/1-ejQrNSHp5MAAXzbmZwipjT081xCb_IM/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 2) {   // sem2 cs12101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1nxew5fwRAWFgQi_X6ri6M6BzSURxQHk-/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/19WYvDMNviTYSfo5oRmp560_Wq823GVuB/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1grorIqkplab48Z8c7dfhyoKWL8DTfM6y/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1gLQMHqBKArKXarntDYvwOBW04orRldcc/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1gzZaBTiaTNlNkCg1xk_Lf1S-KInLJYO4/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1CvTygsxCdZt8C5RzeU5MTfaapfciqsTU/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1M-OpSdlcbcRzmDjL70cXBpbXK0ts63SM/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/1Qmmx_oCSxgyHTMQ4GYOTsmwvaYJw7MtD/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/1QoOnQU6vVKSxJz1_lUB0e7r9KJ0Il8ll/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/1t2xsi7mrwesZqW04ofJs5k5BidWeJGgO/view?usp=sharing"; break;
                        case 11: $link = "https://drive.google.com/file/d/1su9yM8hf84TZ4Iq4VBdowJjEJWeAC_pM/view?usp=sharing"; break;
                        case 12: $link = "https://drive.google.com/file/d/1Ph-IOSr0yUZs8LOoHIaHLK0MwGhs1ewy/view?usp=sharing"; break;
                        case 13: $link = "https://drive.google.com/file/d/1nQ5357jbb87wBC3Xn66YioHpy0-Y-lF_/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 3) {   // sem2 cy12101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1wu3UUH3wKs1M4lgbvwpMK3K9fyRC9W9W/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1j1Htg7Rg5mSa6JLXnF6L-UdOZ7dPUeyJ/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1MSe99FJ5eTtZ-JxGrVPiD6PO9XtUuXc_/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1DKE02fDVFugzO7WJfFPn_g9Mw37-ZkDs/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1fbMT3VyDSuEItlqe0Gvu18TChr2hs83K/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1czvC8ITTrzGLtUKkNhACbymMV10Arqt-/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1Dz2jyKOKrjAypt1n2cYoYok4G6AGhmXF/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/1oX2XMmQ5Qrag2FaECGmHq1MDUeW818GI/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 4) {   // sem2 cy12102
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1oPHdAi0tPeMeXY2ujTtP4NN9yuroMqwB/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1OQYAAV-8v3tQMwkSgU9z6D_B_5sX__M4/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/18vCqdAhQTWu-3dnPWeY4m1MbahFiYXfZ/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1azIMnmlPMYERjgsQRCG_CD_A-xciDPYI/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1FG9tOPdine2NrE0alVA6MV3eHPIxnXl7/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1GX2g8-2DirDDuKirkku-d4LaWmJVzLvA/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1f40llrWMi7vUqgIneUDNacHiwgcQ1u3A/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/1m3eCk_cILbDe7byRn1inHkRwljAguDQI/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/1qFs5nxEWrGmcPGbi_GbFQL9ft_tVn-jW/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/14HHC4fqaXF3yEq9hSHrlqgWPAkU_WB1j/view?usp=sharing"; break;
                        case 11: $link = "https://drive.google.com/file/d/15u4rRhobTFPJbYipGaGzlo55KhP_ZORJ/view?usp=sharing"; break;
                        case 12: $link = "https://drive.google.com/file/d/1a3OOO8bzD0o_pWAqMlzmkaKQGWGwA3Ug/view?usp=sharing"; break;
                        case 13: $link = "https://drive.google.com/file/d/1q_WgGHgtsK9ps1QqqdoXBv-i9Tt4XBN8/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 5) {   // sem2 ec12101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1RkY79QrkvbeTU3s_jG6TCgMAow7Y0v9X/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1XtvkQVmnukxcUdOSl7Jaz6YrGLo8VA-a/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/19b4u13nm0YjaHioWQ0Rwx1wIniJj845C/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1ZQ1XHfdgHNEGM5w29pL9nJIUm4-Hn6UI/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/169ucr-_GCrEqU1IR59-vbaepXvjdad1X/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 6) {   // sem2 hs12101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1M2PMT5dc-cYIU2V_1EQZG8Vk4a1p5crc/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/16lkd9NttOCaxn-JYyjJyPJhfoca9W2uv/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1Tfp05heOKim-xIVmGNUwbIRI5UFFW0C2/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1kLsLiRyh9jHtJ3lYgzybXWdvlCZG0KKa/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1nOwzsyE6hOhQ98SlVqz2ftiwDzTGOlSU/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1eKs-QagdknK38U9xCdDOh-XcAFF30IT9/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else if ($section == 7) {   // sem2 ma12101
                    switch ($fid) {
                        case 1: $link = "https://drive.google.com/file/d/1ek_EyUBND1I4u6lHMm21z4A27yUbchT8/view?usp=sharing"; break;
                        case 2: $link = "https://drive.google.com/file/d/1bAy-f7OTNIAcdDwUtUSgurk1Af8hRlQU/view?usp=sharing"; break;
                        case 3: $link = "https://drive.google.com/file/d/1ffoCcC8PfzOH2sxwPlYLq_CchityBe_e/view?usp=sharing"; break;
                        case 4: $link = "https://drive.google.com/file/d/1lEBTEA6M5sD8N9Lhl9jA01dHANxxRN50/view?usp=sharing"; break;
                        case 5: $link = "https://drive.google.com/file/d/1exzx428NsyUZy-ArCYGBf4w9FKZpKyOT/view?usp=sharing"; break;
                        case 6: $link = "https://drive.google.com/file/d/1P2-B-VmF2fGNWW6Y1_KuXUcUXJsISAyy/view?usp=sharing"; break;
                        case 7: $link = "https://drive.google.com/file/d/1Y0rl8l9bsjtQU25juSzqm9jIZEYytKVA/view?usp=sharing"; break;
                        case 8: $link = "https://drive.google.com/file/d/127AhiSAujTf2jUBJVoCQjv6oVuv9c2xH/view?usp=sharing"; break;
                        case 9: $link = "https://drive.google.com/file/d/1ITinI7bmj1TO27csNy3wG_VyszYCDt2L/view?usp=sharing"; break;
                        case 10: $link = "https://drive.google.com/file/d/183W5iirP_9ZQ5dZNUuQSpWXdFuFf-E4i/view?usp=sharing"; break;
                        case 11: $link = "https://drive.google.com/file/d/1hmzfROgsF_Qt_PZqoxRjSUybEtmTXgba/view?usp=sharing"; break;
                        case 12: $link = "https://drive.google.com/open?id=1QkN-DpVoDE8_N6zpxy_W-G3oCM6du8Is"; break;
                        case 13: $link = "https://drive.google.com/file/d/1uSuT1dqih-zhYka8pX6uxVPBQinKBdv8/view?usp=sharing"; break;
                        case 14: $link = "https://drive.google.com/file/d/1FKXr4YCWUbianq8PwCWgdX9o9Ryxpc3P/view?usp=sharing"; break;
                        case 15: $link = "https://drive.google.com/file/d/18UnOPj93x8QxVzKaJpdgghheAgJ6zUGg/view?usp=sharing"; break;
                        default: $link_availability = 0;
                    }
                }
                else {
                    $link_availability = 0;
                }
            }
            else {
                $link_availability = 0;
            }

            if ($link_availability == 1) {
                header("location: $link");
            }
            else {
                header('location: file_not_found.html');
            }
        }
        else {
            ?>
                <script>
                    alert("Invalid Request");
                    location.href = "explore.php";
                </script>
            <?php
        }
    }
    else if (isset($_GET['fid'])) {
        $tab = $_GET['tid'];
        $section = $_GET['sid'];
        $fid = $_GET['fid'];
        $download = 1;
        $file = "";
        $filename = "unknownfile";

        if ($tab == "sem1") {
            if($section == 1) {
                $download = 0;
            }
            else if ($section == 2) {
                switch ($fid) {
                    case 1: $file = "files/sem1/cs/c_strings.pdf"; $filename = "c_strings.pdf"; break;
                    case 2: $file = "files/sem1/cs/c_programming.pdf"; $filename = "c_programming.pdf"; break;
                    case 3: $file = "files/sem1/cs/file_handling_1.pdf"; $filename = "file_handling_1.pdf"; break;
                    case 4: $file = "files/sem1/cs/file_handling_2.pdf"; $filename = "file_handling_2.pdf"; break;
                    case 5: $file = "files/sem1/cs/preprocessor_directives.pdf"; $filename = "preprocessor_directives.pdf"; break;
                    case 6: $file = "files/sem1/cs/stack_and_heap.pdf"; $filename = "stack_and_heap.pdf"; break;
                    case 7: $file = "files/sem1/cs/structures_union_pointers_filehandling.pdf"; $filename = "structures_union_pointers_filehandling.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 3){
                switch ($fid) {
                    case 1: $file = "files/sem1/ics/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem1/ics/assignment_2.pdf"; $filename = "assignment_2.pdf"; break;
                    case 3: $file = "files/sem1/ics/assignment_3.pdf"; $filename = "assignment_3.pdf"; break;
                    case 4: $file = "files/sem1/ics/assignment_4.xlsx"; $filename = "assignment_4.xlsx"; break;
                    case 5: $file = "files/sem1/ics/assignment_4_sol.zip"; $filename = "assignment_4_sol.zip"; break;
                    case 6: $file = "files/sem1/ics/languages.ppt"; $filename = "computer_languages.ppt"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 4) {
                switch ($fid) {
                    case 1: $file = "files/sem1/electrical/3_phase_induction_motor.pdf"; $filename = "3_phase_induction_motor.pdf"; break;
                    case 2: $file = "files/sem1/electrical/electric_motors_1.pdf"; $filename = "electric_motors_1.pdf"; break;
                    case 3: $file = "files/sem1/electrical/electric_motors_2.pdf"; $filename = "electric_motors_2.pdf"; break;
                    case 4: $file = "files/sem1/electrical/electrical_electronical_instruments.pdf"; $filename = "electrical_electronical_instruments.pdf"; break;
                    case 5: $file = "files/sem1/electrical/electrical_machines.pptx"; $filename = "electrical_machines.pptx"; break;
                    case 6: $file = "files/sem1/electrical/notes_ac.pdf"; $filename = "notes_ac.pdf"; break;
                    case 7: $file = "files/sem1/electrical/notes_dc.pdf"; $filename = "notes_dc.pdf"; break;
                    case 8: $file = "files/sem1/electrical/notes_dc_gen.pdf"; $filename = "notes_dc_gen.pdf"; break;
                    case 9: $file = "files/sem1/electrical/notes_dc_motor.pdf"; $filename = "notes_dc_motor.pdf"; break;
                    case 10: $file = "files/sem1/electrical/power_system.pptx"; $filename = "power_system.pptx"; break;
                    case 11: $file = "files/sem1/electrical/sensors.pdf"; $filename = "sensors.pdf"; break;
                    case 12: $file = "files/sem1/electrical/sensors.pptx"; $filename = "sensors.pptx"; break;
                    case 13: $file = "files/sem1/electrical/single_phase_induction_motor.pdf"; $filename = "single_phase_induction_motor.pdf"; break;
                    case 14: $file = "files/sem1/electrical/star_delta_1.jpg"; $filename = "star_delta_1.jpg"; break;
                    case 15: $file = "files/sem1/electrical/star_delta_2.jpg"; $filename = "star_delta_2.jpg"; break;
                    case 16: $file = "files/sem1/electrical/stepper_motors.pdf"; $filename = "stepper_motors.pdf"; break;
                    case 17: $file = "files/sem1/electrical/synchronous_machine_alternator.pdf"; $filename = "synchronous_machine_alternator.pdf"; break;
                    case 18: $file = "files/sem1/electrical/synchronous_motor.pdf"; $filename = "synchronous_motor.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 5) {
                switch ($fid) {
                    case 1: $file = "files/sem1/english/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem1/english/assignment_2.pdf"; $filename = "assignment_2.pdf"; break;
                    case 3: $file = "files/sem1/english/notes_1.pdf"; $filename = "notes_1.pdf"; break;
                    case 4: $file = "files/sem1/english/english_in_india.pdf"; $filename = "english_in_india.pdf"; break;
                    case 5: $file = "files/sem1/english/of_studies.pdf"; $filename = "of_studies.pdf"; break;
                    case 6: $file = "files/sem1/english/on_doing_nothing.pdf"; $filename = "on_doing_nothing.pdf"; break;
                    case 7: $file = "files/sem1/english/sonnet_116.pdf"; $filename = "sonnet_116.pdf"; break;
                    case 8: $file = "files/sem1/english/tyger_text.pdf"; $filename = "tyger_text.pdf"; break;
                    case 9: $file = "files/sem1/english/west_wind.pdf"; $filename = "west_wind.pdf"; break;
                    case 10: $file = "files/sem1/english/when_mind_is_free.pdf"; $filename = "when_mind_is_free.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 6) {
                switch ($fid) {
                    case 1: $file = "files/sem1/maths/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem1/maths/assignment_2.pdf"; $filename = "assignment_2.pdf"; break;
                    case 3: $file = "files/sem1/maths/assignment_3.pdf"; $filename = "assignment_3.pdf"; break;
                    case 4: $file = "files/sem1/maths/assignment_4.pdf"; $filename = "assignment_4.pdf"; break;
                    case 5: $file = "files/sem1/maths/la_applications.pdf"; $filename = "linear_algebra_applications.pdf"; break;
                    case 6: $file = "files/sem1/maths/la_hoffman_kunze.pdf"; $filename = "linear_algebra_hoffman_kunze.pdf"; break;
                    case 7: $file = "files/sem1/maths/la_kenneth_ray.pdf"; $filename = "linear_algebra_kenneth_ray.pdf"; break;
                    case 8: $file = "files/sem1/maths/notes_de.pdf"; $filename = "notes_de.pdf"; break;
                    case 9: $file = "files/sem1/maths/notes_linear_transform.pdf"; $filename = "notes_linear_transform.pdf"; break;
                    case 10: $file = "files/sem1/maths/notes_sequence_series.pdf"; $filename = "notes_sequence_series.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 7){
                switch ($fid) {
                    case 1: $file = "files/sem1/physics/module_4.pdf"; $filename = "module_4.pdf"; break;
                    case 2: $file = "files/sem1/physics/optics.pdf"; $filename = "optics.pdf"; break;
                    default: $download = 0;
                }
            }
            else {
                $download = 0;
            }
        }
        else if ($tab == "sem2") {
            if($section == 1) {
                switch ($fid) {
                    case 1: $download = 0; break;
                    case 2: $file = "files/sem2/questionpapers/MS1_CY12101.pdf"; $filename = "MS1_CY12101.pdf"; break;
                    case 3: $file = "files/sem2/questionpapers/MS1_CY12102.pdf"; $filename = "MS1_CY12102.pdf"; break;
                    case 4: $file = "files/sem2/questionpapers/MS1_EC12101.pdf"; $filename = "MS1_EC12101.pdf"; break;
                    case 5: $file = "files/sem2/questionpapers/MS1_HS12101.pdf"; $filename = "MS1_HS12101.pdf"; break;
                    case 6: $file = "files/sem2/questionpapers/MS1_MA12101.pdf"; $filename = "MS1_MA12101.pdf"; break;
                    case 7: $file = "files/sem2/questionpapers/MS2_CS12101.pdf"; $filename = "MS2_CS12101.pdf"; break;
                    case 8: $file = "files/sem2/questionpapers/MS2_CY12101.pdf"; $filename = "MS2_CY12101.pdf"; break;
                    case 9: $file = "files/sem2/questionpapers/MS2_CY12102.pdf"; $filename = "MS2_CY12102.pdf"; break;
                    case 10: $file = "files/sem2/questionpapers/MS2_EC12101.pdf"; $filename = "MS2_EC12101.pdf"; break;
                    case 11: $file = "files/sem2/questionpapers/MS2_HS12101.pdf"; $filename = "MS2_HS12101.pdf"; break;
                    case 12: $file = "files/sem2/questionpapers/MS2_MA12101.pdf"; $filename = "MS2_MA12101.pdf"; break;
                    case 13: $file = "files/sem2/questionpapers/ES_CS12101.pdf"; $filename = "ES_CS12101.pdf"; break;
                    case 14: $file = "files/sem2/questionpapers/ES_CY12101.pdf"; $filename = "ES_CY12101.pdf"; break;
                    case 15: $file = "files/sem2/questionpapers/ES_CY12102.pdf"; $filename = "ES_CY12102.pdf"; break;
                    case 16: $file = "files/sem2/questionpapers/ES_EC12101.pdf"; $filename = "ES_EC12101.pdf"; break;
                    case 17: $file = "files/sem2/questionpapers/ES_HS12101.pdf"; $filename = "ES_HS12101.pdf"; break;
                    case 18: $file = "files/sem2/questionpapers/ES_MA12101.pdf"; $filename = "ES_MA12101.pdf"; break;
                    case 19: $file = "files/sem2/questionpapers/ES_ME12202.pdf"; $filename = "ES_ME12202.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 2){
                switch ($fid) {
                    case 1: $file = "files/sem2/cs/fopl.docx"; $filename = "Foundation_Programing_Lab.docx"; break;
                    case 2: $file = "files/sem2/cs/t_ds.docx"; $filename = "Theory_Data_structures.docx"; break;
                    case 3: $file = "files/sem2/cs/trees_fundamental.pdf"; $filename = "Trees_Fundamental.pdf"; break;
                    case 4: $file = "files/sem2/cs/bst.pdf"; $filename = "BST.pdf"; break;
                    case 5: $file = "files/sem2/cs/binary_tree_and_graph.docx"; $filename = "Tree_Grapgh.docx"; break;
                    case 6: $file = "files/sem2/cs/binary_trees.pdf"; $filename = "Binary_Trees.pdf"; break;
                    case 7: $file = "files/sem2/cs/bst.c"; $filename = "bst.c"; break;
                    case 8: $file = "files/sem2/cs/doubly_linked_list.pdf"; $filename = "Doubly_Linked_lists.pdf"; break;
                    case 9: $file = "files/sem2/cs/linked_lists_1.pdf"; $filename = "Linked_list_1.pdf"; break;
                    case 10: $file = "files/sem2/cs/linked_lists_2.pdf"; $filename = "Linked_list_2.pdf"; break;
                    case 11: $file = "files/sem2/cs/queues.pdf"; $filename = "Queues.pdf"; break;
                    case 12: $file = "files/sem2/cs/stacks_1.pdf"; $filename = "Stacks_1.pdf"; break;
                    case 13: $file = "files/sem2/cs/stacks_2.pdf"; $filename = "Stacks_2.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 3){
                switch ($fid) {
                    case 1: $file = "files/sem2/chemistry/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem2/chemistry/assignment_1_sol.zip"; $filename = "assignment_1_solution.pdf"; break;
                    case 3: $file = "files/sem2/chemistry/chem_notes_1.pdf"; $filename = "chem_notes_1.pdf"; break;
                    case 4: $file = "files/sem2/chemistry/chem_notes_1.zip"; $filename = "chem_notes_2.zip"; break;
                    case 5: $file = "files/sem2/chemistry/electrochemistry_corrosion.pdf"; $filename = "electrochemistry_corrosion.pdf"; break;
                    case 6: $file = "files/sem2/chemistry/fuels.pdf"; $filename = "fuels.pdf"; break;
                    case 7: $file = "files/sem2/chemistry/nanoscience.pdf"; $filename = "nanoscience.pdf"; break;
                    case 8: $file = "files/sem2/chemistry/solid_state.pdf"; $filename = "solid_state.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 4){
                switch ($fid) {
                    case 1: $file = "files/sem2/environmental/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem2/environmental/assignment_1_sol.zip"; $filename = "assignment_1_sol.zip"; break;
                    case 3: $file = "files/sem2/environmental/assignment_2.doc"; $filename = "assignment_2.doc"; break;
                    case 4: $file = "files/sem2/environmental/hse_intro.pdf"; $filename = "hse_intro.pdf"; break;
                    case 5: $file = "files/sem2/environmental/hse_handbook.pdf"; $filename = "hse_handbook.pdf"; break;
                    case 6: $file = "files/sem2/environmental/lec_notes_3.pdf"; $filename = "lecture_notes_3.pdf"; break;
                    case 7: $file = "files/sem2/environmental/lec_notes_4.pdf"; $filename = "lecture_notes_4.pdf"; break;
                    case 8: $file = "files/sem2/environmental/lec_notes_6.pdf"; $filename = "lecture_notes_6.pdf"; break;
                    case 9: $file = "files/sem2/environmental/lec_notes_7.pdf"; $filename = "lecture_notes_7.pdf"; break;
                    case 10: $file = "files/sem2/environmental/lec_notes_8.pdf"; $filename = "lecture_notes_8.pdf"; break;
                    case 11: $file = "files/sem2/environmental/lec_notes_air_pollution.pdf"; $filename = "lecture_notes_air_pollution.pdf"; break;
                    case 12: $file = "files/sem2/environmental/lec_notes_hazardous_wastes.pdf"; $filename = "lecture_notes_hazardous_wastes.pdf"; break;
                    case 13: $file = "files/sem2/environmental/biodiversity.pptx"; $filename = "biodiversity.pptx"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 5){
                switch ($fid) {
                    case 1: $file = "files/sem2/electronics/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem2/electronics/assignment_attendance_1.pdf"; $filename = "assignment_shortattendance_1.pdf"; break;
                    case 3: $file = "files/sem2/electronics/assignment_attendance_2.pdf"; $filename = "assignment_shortattendance_2.pdf"; break;
                    case 4: $file = "files/sem2/electronics/module_1.pdf"; $filename = "module1.pdf"; break;
                    case 5: $file = "files/sem2/electronics/notes_dj.pdf"; $filename = "notes_diodes.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 6){
                switch ($fid) {
                    case 1: $file = "files/sem2/english/assignment_1.pdf"; $filename = "assignment_1.pdf"; break;
                    case 2: $file = "files/sem2/english/assignment_1_sol.pdf"; $filename = "assignment_1_sol.pdf"; break;
                    case 3: $file = "files/sem2/english/assignment_x_sol.pdf"; $filename = "assignment_x_sol.pdf"; break;
                    case 4: $file = "files/sem2/english/eng_notes_1.pdf"; $filename = "hs_notes_1.pdf"; break;
                    case 5: $file = "files/sem2/english/eng_notes_2.pdf"; $filename = "hs_notes_1.pdf"; break;
                    case 6: $file = "files/sem2/english/kanthapura_novel.pdf"; $filename = "kanthapura_novel.pdf"; break;
                    default: $download = 0;
                }
            }
            else if ($section == 7){
                switch ($fid) {
                    case 1: $file = "files/sem2/maths/module_1.pdf"; $filename = "module1.pdf"; break;
                    case 2: $file = "files/sem2/maths/module_1_sol.pdf"; $filename = "module1_sol.pdf"; break;
                    case 3: $file = "files/sem2/maths/module_2.pdf"; $filename = "module2.pdf"; break;
                    case 4: $file = "files/sem2/maths/module_2_sol.pdf"; $filename = "module2_sol.pdf"; break;
                    case 5: $file = "files/sem2/maths/module_3.pdf"; $filename = "module3.pdf"; break;
                    case 6: $file = "files/sem2/maths/module_4.pdf"; $filename = "module4.pdf"; break;
                    case 7: $file = "files/sem2/maths/notes_fourier.pdf"; $filename = "notes_fourier.pdf"; break;
                    case 8: $file = "files/sem2/maths/notes_laplace.pdf"; $filename = "notes_laplace.pdf"; break;
                    case 9: $file = "files/sem2/maths/notes_numerical.pdf"; $filename = "notes_numericalanalysis.pdf"; break;
                    case 10: $file = "files/sem2/maths/notes_probability.pdf"; $filename = "notes_probability.pdf"; break;
                    case 11: $file = "files/sem2/maths/d_t_integration.pdf"; $filename = "double_triple_integration.pdf"; break;
                    case 12: $file = "files/sem2/maths/laplace_1.pdf"; $filename = "laplace_transform_1.pdf"; break;
                    case 13: $file = "files/sem2/maths/laplace_2.pdf"; $filename = "laplace_transform_2.pdf"; break;
                    case 14: $file = "files/sem2/maths/line_integral.pdf"; $filename = "line_integral.pdf"; break;
                    case 15: $file = "files/sem2/maths/trigonomtery.pdf"; $filename = "trigonomtery.pdf"; break;
                    default: $download = 0;
                }
            }
            else {
                $download == 0;
            }
        }
        else {
           $download = 0;
        }

        $fileloc = dirname(__file__).'/'.$file;
        if (!file_exists($fileloc)) {
            $download = 0;
        }
        
        // Code to download files without giving actual file urls
        if ($download == 1) {
            header('Content-Type: application/force-download');
            header('Content-Length:' . filesize($fileloc));
            header("Content-Disposition: inline; filename=\"".$filename."\"");
            $filespointer =  fopen($fileloc,"rb");
            fpassthru($filespointer);
        }
        else {
            ?>
                <script>
                    alert("An error occurred! File not found or Invalid Request.");
                    location.href = "explore.php";
                </script>
            <?php
        }     
    }
    else {
        ?>
            <script>
                alert("An error occurred! File not found or Invalid Request.");
                location.href = "explore.php";
            </script>
        <?php
    }
?>