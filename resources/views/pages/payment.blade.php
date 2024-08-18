<x-layouts.layout>
    <section
        class="rounded-3xl flex items-center justify-center mt-[112px] mb-[82px] max-xl:mt-[64px] max-xl:mb-[165px] max-sm:mt-8 max-sm:mb-[265px] px-100 max-w-[1440px] w-full max-xl:px-8 max-sm:px-4">
        <form action=""
            class="flex flex-col w-[563px] max-sm:w-full rounded-[24px] p-11 gap-8 max-sm:p-[16px_8px_16px_8px] bg-[#FFFFFF] drop-shadow-sm">
            @csrf
            <div class="flex flex-col items-center gap-6">
                <h3 class="font-manrope-extrabold font-[600] text-[24px] leading-[33.6px] text-[#444141]">Credit Card
                </h3>
                <div class="flex flex-col gap-6 max-sm:w-full">
                    <div class="relative max-sm:w-full">
                        <input type="text" id="Name"
                            class="w-[467px] max:xl block bg-white rounded-[8px] p-[13px_16px_13px_16px] focus:p-[9px_16px_9px_16px] h-[64px] max-xl:h-[56px] focus:border-[#3E3E3E] font-manrope-regular font-[400] text-[14px] text-[#141414] leading-[21px] max-sm:w-full border border-border-900 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="Name"
                            class="translate-x-[7px] font-manrope-regular font-[400] text-[12px] text-[#969696] placeholder-[#969696] leading-[18px] absolute dark:text-gray-400 duration-300 transform -translate-y-[10px] max-xl:-translate-y-3 top-4 z-10 origin-[0] start-2.5 peer-placeholder-shown:translate-y-2 max-xl:peer-placeholder-shown:translate-y-1 peer-focus:-translate-y-[10px] max-xl:peer-focus:-translate-y-3 max-xs:peer-focus:-translate-y-[12px] rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Name</label>
                    </div>
                    <div class="relative max-sm:w-full">
                        <input type="text" id="Card Number"
                            class="w-[467px] max:xl block bg-white rounded-[8px] p-[13px_16px_13px_16px] focus:p-[9px_16px_9px_16px] h-[64px] max-xl:h-[56px] focus:border-[#3E3E3E] font-manrope-regular font-[400] text-[14px] text-[#141414] leading-[21px] max-sm:w-full border border-border-900 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="Card Number"
                            class="translate-x-[7px] font-manrope-regular font-[400] text-[12px] text-[#969696] placeholder-[#969696] leading-[18px] absolute dark:text-gray-400 duration-300 transform -translate-y-[10px] max-xl:-translate-y-3 top-4 z-10 origin-[0] start-2.5 peer-placeholder-shown:translate-y-2 max-xl:peer-placeholder-shown:translate-y-1 peer-focus:-translate-y-[10px] max-xl:peer-focus:-translate-y-3 max-xs:peer-focus:-translate-y-[12px] rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Card
                            Number</label>
                    </div>
                    <div class="relative max-sm:w-full">
                        <input type="text" id="CVV"
                            class="w-[467px] max:xl block bg-white rounded-[8px] p-[13px_16px_13px_16px] focus:p-[9px_16px_9px_16px] h-[64px] max-xl:h-[56px] focus:border-[#3E3E3E] font-manrope-regular font-[400] text-[14px] text-[#141414] leading-[21px] max-sm:w-full border border-border-900 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="CVV"
                            class="translate-x-[7px] font-manrope-regular font-[400] text-[12px] text-[#969696] placeholder-[#969696] leading-[18px] absolute dark:text-gray-400 duration-300 transform -translate-y-[10px] max-xl:-translate-y-3 top-4 z-10 origin-[0] start-2.5 peer-placeholder-shown:translate-y-2 max-xl:peer-placeholder-shown:translate-y-1 peer-focus:-translate-y-[10px] max-xl:peer-focus:-translate-y-3 max-xs:peer-focus:-translate-y-[12px] rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">CVV</label>
                    </div>
                    <div class="relative max-sm:w-full">
                        <input type="text" id="Zip Code"
                            class="w-[467px] max:xl block bg-white rounded-[8px] p-[13px_16px_13px_16px] focus:p-[9px_16px_9px_16px] h-[64px] max-xl:h-[56px] focus:border-[#3E3E3E] font-manrope-regular font-[400] text-[14px] text-[#141414] leading-[21px] max-sm:w-full border border-border-900 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="Zip Code"
                            class="translate-x-[7px] font-manrope-regular font-[400] text-[12px] text-[#969696] placeholder-[#969696] leading-[18px] absolute dark:text-gray-400 duration-300 transform -translate-y-[10px] max-xl:-translate-y-3 top-4 z-10 origin-[0] start-2.5 peer-placeholder-shown:translate-y-2 max-xl:peer-placeholder-shown:translate-y-1 peer-focus:-translate-y-[10px] max-xl:peer-focus:-translate-y-3 max-xs:peer-focus:-translate-y-[12px] rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Zip
                            Code</label>
                    </div>
                </div>
                <div class="flex flex-1 gap-8 max-sm:gap-4 max-sm:flex-col w-full">
                    <button
                        class="p-[8px_16px] flex justify-center items-center rounded-[16px] border border-purple-600 hover:border-purple-900 text-purple-600 hover:text-purple-900 font-manrope-extrabold font-[700] text-[16px] leading-6 w-[217.5px] max-sm:w-full h-[56px]">Back</button>
                    <button
                        class="p-[8px_16px] flex gap-2 justify-center items-center rounded-[16px] border border-purple-600 hover:border-purple-900 bg-purple-600 hover:bg-purple-900 text-white font-manrope-extrabold font-[700] text-[16px] leading-6 w-[217.5px] max-sm:w-full h-[56px]">Continue</button>
                </div>
            </div>
        </form>
    </section>

</x-layouts.layout>
