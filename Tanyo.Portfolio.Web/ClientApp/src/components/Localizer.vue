
<template>
<form asp-controller="Home" asp-action="SetLanguage" id="selectLanguage" asp-route-returnUrl="@returnUrl" method="post" class="form-horizontal" role="form">
    @foreach (var culture in cultureItems)
    {
        <img src="/img/flags/@(culture.Value).png" title="culture.Text]" alt="culture.Text]" onclick="document.getElementById('culture').value = '@culture.Value'; document.getElementById('selectLanguage').submit();" class="btn-localization" />
    }
    <input id="culture" type="hidden" name="culture" value="en" />
</form>
</template>

<script>
export default {
  name: 'Localizer',
  created() {

  },
  data() {
    return {
    }
  },
  props: {
   
  },
  methods: {
   
  },
}
</script>

<style lang="scss" scoped>

</style>

