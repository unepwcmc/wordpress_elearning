import { at } from 'lodash'

export default function (translationKey, options) {
  const rawTranslation = at(this.$root.translations, translationKey)
  let translation = rawTranslation[0]
  for (let key in options) {
    translation = translation.replace(`%{${key}}`, options[key])
  }
  return translation
}
