import m from"./AdditionalInformation.1bbe00a7.js";import p from"./Category.643c5b5a.js";import s from"./Features.e9932df9.js";import a from"./Import.c21a216d.js";import l from"./LicenseKey.36733a45.js";import c from"./SearchAppearance.7ea5910c.js";import u from"./SmartRecommendations.bcccc7c7.js";import d from"./Success.1249cd94.js";import f from"./Welcome.834067a1.js";import{c as i,a as e,b as _}from"./vuex.esm.8fdeb4b6.js";import{n as h}from"./_plugin-vue2_normalizer.61652a7c.js";import"./WpTable.320da53b.js";import"./helpers.de7566d0.js";import"./postContent.616e0b04.js";import"./index.ec9852b3.js";import"./isArrayLikeObject.9b4b678d.js";import"./default-i18n.3a91e0e5.js";import"./Caret.d93b302e.js";import"./cleanForSlug.51ef7354.js";import"./constants.0d8c074c.js";import"./html.14f2a8b9.js";import"./Index.5f7ddb17.js";import"./Image.a79f4413.js";import"./MaxCounts.12b45bab.js";import"./SaveChanges.e40a9083.js";import"./Img.c432d837.js";import"./Phone.c26b4769.js";import"./_commonjsHelpers.f84db168.js";import"./RadioToggle.e6e54396.js";import"./SocialProfiles.dcf56054.js";import"./Checkbox.60ba2f56.js";import"./Checkmark.f26f6201.js";import"./Textarea.ce149d81.js";import"./index.4b67d3e2.js";import"./SettingsRow.edbb3005.js";import"./Row.830f6397.js";import"./Twitter.79b93d10.js";import"./Plus.6984df43.js";import"./Header.f5e32717.js";import"./Logo.8785cc9f.js";import"./Steps.771a7936.js";import"./HighlightToggle.62b97732.js";import"./Radio.7965b35c.js";import"./HtmlTagsEditor.70d3cf0a.js";import"./Editor.3e312d73.js";import"./UnfilteredHtml.7bdb1712.js";import"./ImageSeo.47aac051.js";import"./NewsChannel.34f76348.js";import"./ProBadge.66f48bdc.js";import"./popup.b60b699f.js";import"./params.597cd0f5.js";import"./GoogleSearchPreview.853cda22.js";import"./PostTypeOptions.5681b4ee.js";import"./Tooltip.68a8a92b.js";import"./Book.9dd59972.js";import"./VideoCamera.8ac2fbea.js";const S={components:{AdditionalInformation:m,Category:p,Features:s,Import:a,LicenseKey:l,SearchAppearance:c,SmartRecommendations:u,Success:d,Welcome:f},computed:{...i("wizard",["shouldShowImportStep"]),...i(["isUnlicensed"]),...e("wizard",["stages"]),...e(["internalOptions"])},methods:{..._("wizard",["setStages","loadState"]),deleteStage(t){const o=[...this.stages],r=o.findIndex(n=>t===n);r!==-1&&this.$delete(o,r),this.setStages(o)}},mounted(){if(this.internalOptions.internal.wizard){const t=JSON.parse(this.internalOptions.internal.wizard);delete t.currentStage,delete t.stages,delete t.licenseKey,this.loadState(t)}this.shouldShowImportStep||this.deleteStage("import"),this.isUnlicensed||this.deleteStage("license-key"),this.$isPro&&this.deleteStage("smart-recommendations")}};var g=function(){var o=this,r=o._self._c;return r(o.$route.name,{tag:"component"})},y=[],w=h(S,g,y,!1,null,null,null,null);const vt=w.exports;export{vt as default};