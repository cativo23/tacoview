<template>
    <FormSection @submitted="updatePassword">
        <template #title>
            Update Basic Information
        </template>

        <template #description>
            Ensure the date is correct.
        </template>

        <template #form>
            <div class="col-span-3 sm:col-span-3">
                <Label for="name" value="Name" />
                <Input id="name" ref="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <Label for="iso3" value="ISO3" />
                <Input id="iso3" ref="iso3" type="text" class="mt-1 block w-full" v-model="form.iso3" autocomplete="iso3" />
                <InputError :message="form.errors.iso3" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <Label for="numeric_code" value="Numeric Code" />
                <Input id="numeric_code" type="text" class="mt-1 block w-full" v-model="form.numeric_code" autocomplete="numeric_code" />
                <InputError :message="form.errors.numeric_code" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <Button :disabled="form.processing">
                Save
            </Button>
        </template>
    </FormSection>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import Button from '@/Components/Button.vue'
import FormSection from '@/Components/FormSection.vue'
import Input from '@/Components/Input.vue'
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import { successToast } from '@/Toast'

const name = ref(null)
const iso3 = ref(null)

let props = defineProps({
    country: Object,
});

const form = useForm({
    name: props.country.name,
    iso3: props.country.iso3,
    numeric_code: props.country.numeric_code,
    iso2: props.country.iso2,
    phonecode: props.country.phonecode,
    capital: props.country.capital,
    currency: props.country.currency,
    currency_name: props.country.currency_name,
    currency_symbol: props.country.currency_symbol,
    tdl: props.country.tdl,
    native: props.country.native,
    region: props.country.region,
    subregion: props.country.subregion,
    timezones: props.country.timezones,
    translations: props.country.translations,
    latitude: props.country.latitude,
    longitude: props.country.longitude,
    emoji: props.country.emoji,
    emojiU: props.country.emojiU,
    flag: props.country.flag,
    wikiDataId: props.country.wikiDataId,
})

const updatePassword = () => {
    form.put(route('countries.update', props.country.id), {
        errorBag: 'countriesSaveErrors',
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
            successToast({
                title: 'Success',
                text: props.country.name + ' ' + props.country.emoji +' updated.'
            })
        },
        onError: () => {
            if (form.errors.name) {
                form.reset('name')
                name.value.focus()
            }

            if (form.errors.iso3) {
                form.reset('iso3')
                iso3.value.focus()
            }
        },
    })
}
</script>
